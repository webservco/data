<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use OutOfBoundsException;
use WebServCo\Data\Contract\Extraction\ArrayDataExtractionServiceInterface;
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
    protected ScalarDataExtractionServiceInterface $scalarDataExtractionService;
    protected ScalarNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService;
    private const MESSAGE_KEY_MISSING = 'Array does not contain key: %s.';

    public function __construct(ScalarDataExtractionServiceInterface $scalarDataExtractionService, ScalarNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService)
    {
        $this->scalarDataExtractionService = $scalarDataExtractionService;
        $this->scalarNonEmptyDataExtractionService = $scalarNonEmptyDataExtractionService;
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getBoolean(array $data, string $key, ?bool $defaultValue = null): bool
    {
        if (!array_key_exists($key, $data)) {
            if (is_bool($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getBoolean($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getFloat(array $data, string $key, ?float $defaultValue = null): float
    {
        if (!array_key_exists($key, $data)) {
            if (is_float($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getFloat($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getInt(array $data, string $key, ?int $defaultValue = null): int
    {
        if (!array_key_exists($key, $data)) {
            if (is_int($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getInt($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getString(array $data, string $key, ?string $defaultValue = null): string
    {
        if (!array_key_exists($key, $data)) {
            if (is_string($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getString($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNullableBoolean(array $data, string $key, ?bool $defaultValue = null): ?bool
    {
        if (!array_key_exists($key, $data)) {
            if (is_bool($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getNullableBoolean($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float
    {
        if (!array_key_exists($key, $data)) {
            if (is_float($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getNullableFloat($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNullableInt(array $data, string $key, ?int $defaultValue = null): ?int
    {
        if (!array_key_exists($key, $data)) {
            if (is_int($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getNullableInt($data[$key]);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNullableString(array $data, string $key, ?string $defaultValue = null): ?string
    {
        if (!array_key_exists($key, $data)) {
            if (is_string($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        return $this->scalarDataExtractionService->getNullableString($data[$key]);
    }
}
