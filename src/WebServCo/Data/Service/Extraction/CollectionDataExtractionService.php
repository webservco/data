<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use OutOfBoundsException;
use Override;
use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ArrayStorageServiceInterface;
use WebServCo\Data\Contract\Extraction\CollectionDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\ScalarDataExtractionServiceInterface;

use function array_is_list;
use function array_key_exists;
use function is_array;
use function is_string;
use function sprintf;

/**
 * Strict or loose by the scalar service it is given:
 * `StrictDataExtractionService` takes an item only with its type, `LooseDataExtractionService` casts it.
 * With an array storage service a key can be a path: `user/roles`.
 */
final class CollectionDataExtractionService implements CollectionDataExtractionServiceInterface
{
    private ?ArrayStorageServiceInterface $arrayStorageService;
    private ScalarDataExtractionServiceInterface $scalarDataExtractionService;
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
    /**
     * @var string
     */
    private const MESSAGE_ITEM_TYPE = 'Data type is different than expected: "%s", item "%s".';
    /**
     * @var string
     */
    private const MESSAGE_NOT_ARRAY = 'Data is not an array: "%s".';
    /**
     * @var string
     */
    private const MESSAGE_NOT_FOUND = 'Data not found: "%s".';
    /**
     * @var string
     */
    private const MESSAGE_NOT_LIST = 'Data is not a list: "%s".';
    /**
     * @var string
     */
    private const MESSAGE_NOT_MAP = 'Data is not a map with string keys: "%s".';

    public function __construct(?ArrayStorageServiceInterface $arrayStorageService, ScalarDataExtractionServiceInterface $scalarDataExtractionService)
    {
        $this->arrayStorageService = $arrayStorageService;
        $this->scalarDataExtractionService = $scalarDataExtractionService;
    }

    /**
     * @param array<mixed> $data
     * @param array<mixed>|null $defaultValue
     * @return array<mixed>
     */
    #[Override]
    public function getArray(array $data, string $key, ?array $defaultValue = null): array
    {
        return $this->getArrayValue($data, $key)
            ?? $defaultValue
            ?? throw new OutOfBoundsException(sprintf(self::MESSAGE_NOT_FOUND, $key));
    }

    /**
     * @param array<mixed> $data
     * @param list<int>|null $defaultValue
     * @return list<int>
     */
    #[Override]
    public function getIntList(array $data, string $key, ?array $defaultValue = null): array
    {
        $value = $this->getArrayValue($data, $key);
        if ($value === null) {
            if (!isset($defaultValue)) {
                throw new OutOfBoundsException(sprintf(self::MESSAGE_NOT_FOUND, $key));
            }
            return $defaultValue;
        }

        return $this->extractList($value, $key, \Closure::fromCallable([$this->scalarDataExtractionService, 'getInt']));
    }

    /**
     * @param array<mixed> $data
     * @param list<string>|null $defaultValue
     * @return list<string>
     */
    #[Override]
    public function getStringList(array $data, string $key, ?array $defaultValue = null): array
    {
        $value = $this->getArrayValue($data, $key);
        if ($value === null) {
            if (!isset($defaultValue)) {
                throw new OutOfBoundsException(sprintf(self::MESSAGE_NOT_FOUND, $key));
            }
            return $defaultValue;
        }

        return $this->extractList($value, $key, \Closure::fromCallable([$this->scalarDataExtractionService, 'getString']));
    }

    /**
     * @param array<mixed> $data
     * @param array<string,string>|null $defaultValue
     * @return array<string,string>
     */
    #[Override]
    public function getStringMap(array $data, string $key, ?array $defaultValue = null): array
    {
        $value = $this->getArrayValue($data, $key);
        if ($value === null) {
            if (!isset($defaultValue)) {
                throw new OutOfBoundsException(sprintf(self::MESSAGE_NOT_FOUND, $key));
            }
            return $defaultValue;
        }

        $map = [];
        /** @psalm-suppress MixedAssignment: an item of mixed data; the scalar service gives it its type. */
        foreach ($value as $mapKey => $item) {
            if (!is_string($mapKey)) {
                throw new UnexpectedValueException(sprintf(self::MESSAGE_NOT_MAP, $key));
            }
            $map[$mapKey] = $this->extractItem(
                \Closure::fromCallable([$this->scalarDataExtractionService, 'getString']),
                $item,
                $key,
                $mapKey,
            );
        }

        return $map;
    }

    /**
     * @template T
     * @param array<mixed> $value
     * @param callable(mixed): T $extractItem
     * @return list<T>
     */
    private function extractList(array $value, string $key, callable $extractItem): array
    {
        $arrayIsListFunction = function (array $array): bool {
            if (function_exists('array_is_list')) {
                return array_is_list($array);
            }
            if ($array === []) {
                return true;
            }
            $current_key = 0;
            foreach ($array as $key => $noop) {
                if ($key !== $current_key) {
                    return false;
                }
                ++$current_key;
            }
            return true;
        };
        if (!$arrayIsListFunction($value)) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_NOT_LIST, $key));
        }

        $list = [];
        /** @psalm-suppress MixedAssignment: an item of mixed data; $extractItem gives it its type. */
        foreach ($value as $index => $item) {
            $list[] = $this->extractItem($extractItem, $item, $key, $index);
        }

        return $list;
    }

    /**
     * Gives the item its type, and names the key and the item when it has another type.
     *
     * @template T
     * @param callable(mixed): T $extractItem
     * @return T
     * @param int|string $itemKey
     * @param mixed $item
     */
    private function extractItem(callable $extractItem, $item, string $key, $itemKey)
    {
        try {
            return $extractItem($item);
        } catch (UnexpectedValueException $exception) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_ITEM_TYPE, $key, $itemKey), 0, $exception);
        }
    }

    /**
     * @param array<mixed> $data
     * @return array<mixed>|null null when the key is missing or its value is null
     */
    private function getArrayValue(array $data, string $key): ?array
    {
        /** @psalm-suppress MixedAssignment: a value of mixed data; checked below. */
        $value = $this->getValueFromData($data, $key);
        if ($value === null) {
            return null;
        }

        if (!is_array($value)) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_NOT_ARRAY, $key));
        }

        return $value;
    }

    /**
     * @param array<mixed> $data
     * @return mixed
     */
    private function getValueFromData(array $data, string $key)
    {
        if ($this->arrayStorageService !== null) {
            return $this->arrayStorageService->get($data, $this->arrayStorageService->parseKey($key), null);
        }

        if (array_key_exists($key, $data)) {
            return $data[$key];
        }

        return null;
    }

    // @phpcs:enable
}
