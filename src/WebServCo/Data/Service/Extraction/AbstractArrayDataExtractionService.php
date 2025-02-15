<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use OutOfBoundsException;
use WebServCo\Data\Contract\Extraction\ArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\ArrayStorageServiceInterface;
use WebServCo\Data\Contract\Extraction\ScalarDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\ScalarNonEmptyDataExtractionServiceInterface;

use function array_key_exists;
use function is_bool;
use function is_float;
use function is_int;
use function is_string;
use function sprintf;

abstract class AbstractArrayDataExtractionService implements ArrayDataExtractionServiceInterface
{
    private const string MESSAGE_ERROR = 'Data not found, or wrong type: "%s".';

    public function __construct(
        private ?ArrayStorageServiceInterface $arrayStorageService,
        protected ScalarDataExtractionServiceInterface $scalarDataExtractionService,
        protected ScalarNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService,
    ) {
    }

    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint

    /**
     * @param array<mixed> $data
     */
    public function getBoolean(array $data, string $key, ?bool $defaultValue = null): bool
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        /**
         * No result from simple array, or null result from array storage (if not found, returns defaultValue)
         *
         * Important: array storage can return valid null value (found, and null),
         * in that case it would not be 100% accurate to return default value if value is null
         * (default can be one value and actual value another).
         * However since this is non-null functionality, the end result is the same.
         */
        if ($value === null) {
            // Because return type is not nullable, we can only return defaultValue if not null.
            if (is_bool($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_ERROR, $key));
        }

        return $this->scalarDataExtractionService->getBoolean($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getFloat(array $data, string $key, ?float $defaultValue = null): float
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        /**
         * No result from simple array, or null result from array storage (if not found, returns defaultValue)
         *
         * Important: array storage can return valid null value (found, and null),
         * in that case it would not be 100% accurate to return default value if value is null
         * (default can be one value and actual value another).
         * However since this is non-null functionality, the end result is the same.
         */
        if ($value === null) {
            // Because return type is not nullable, we can only return defaultValue if not null.
            if (is_float($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_ERROR, $key));
        }

        return $this->scalarDataExtractionService->getFloat($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getInt(array $data, string $key, ?int $defaultValue = null): int
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        /**
         * No result from simple array, or null result from array storage (if not found, returns defaultValue)
         *
         * Important: array storage can return valid null value (found, and null),
         * in that case it would not be 100% accurate to return default value if value is null
         * (default can be one value and actual value another).
         * However since this is non-null functionality, the end result is the same.
         */
        if ($value === null) {
            // Because return type is not nullable, we can only return defaultValue if not null.
            if (is_int($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_ERROR, $key));
        }

        return $this->scalarDataExtractionService->getInt($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getString(array $data, string $key, ?string $defaultValue = null): string
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        /**
         * No result from simple array, or null result from array storage (if not found, returns defaultValue)
         *
         * Important: array storage can return valid null value (found, and null),
         * in that case it would not be 100% accurate to return default value if value is null
         * (default can be one value and actual value another).
         * However since this is non-null functionality, the end result is the same.
         */
        if ($value === null) {
            // Because return type is not nullable, we can only return defaultValue if not null.
            if (is_string($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_ERROR, $key));
        }

        return $this->scalarDataExtractionService->getString($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNullableBoolean(array $data, string $key, ?bool $defaultValue = null): ?bool
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        // No other checks here since nullable.

        return $this->scalarDataExtractionService->getNullableBoolean($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        // No other checks here since nullable.

        return $this->scalarDataExtractionService->getNullableFloat($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNullableInt(array $data, string $key, ?int $defaultValue = null): ?int
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        // No other checks here since nullable.

        return $this->scalarDataExtractionService->getNullableInt($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNullableString(array $data, string $key, ?string $defaultValue = null): ?string
    {
        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $value = $this->getValueFromData($data, $key, $defaultValue);

        // No other checks here since nullable.

        return $this->scalarDataExtractionService->getNullableString($value);
    }

    /**
     * @param array<mixed> $data
     */
    private function getValueFromData(array $data, string $key, mixed $defaultValue = null): mixed
    {
        if ($this->arrayStorageService !== null) {
            return $this->arrayStorageService->get($data, $this->arrayStorageService->parseKey($key), $defaultValue);
        }


        if (array_key_exists($key, $data)) {
            return $data[$key];
        }

        return null;
    }

    // @phpcs:enable
}
