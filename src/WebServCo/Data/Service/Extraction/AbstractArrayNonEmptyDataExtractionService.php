<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ArrayNonEmptyDataExtractionServiceInterface;

use function sprintf;

abstract class AbstractArrayNonEmptyDataExtractionService extends AbstractArrayDataExtractionService implements
    ArrayNonEmptyDataExtractionServiceInterface
{
    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNonEmptyFloat(array $data, string $key, ?float $defaultValue = null): float
    {
        $value = $this->getFloat($data, $key, $defaultValue);

        if ($value === 0.0) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_EMPTY, $key));
        }

        return $value;
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNonEmptyInt(array $data, string $key, ?int $defaultValue = null): int
    {
        $value = $this->getInt($data, $key, $defaultValue);

        if ($value === 0) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_EMPTY, $key));
        }

        return $value;
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNonEmptyString(array $data, string $key, ?string $defaultValue = null): string
    {
        $value = $this->getString($data, $key, $defaultValue);

        if ($value === '') {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_EMPTY, $key));
        }

        return $value;
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNonEmptyNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float
    {
        $value = $this->getNullableFloat($data, $key, $defaultValue);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyFloat($data, $key, $defaultValue);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNonEmptyNullableInt(array $data, string $key, ?int $defaultValue = null): ?int
    {
        $value = $this->getNullableInt($data, $key, $defaultValue);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyInt($data, $key, $defaultValue);
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $data
     * @phpcs:enable
     */
    public function getNonEmptyNullableString(array $data, string $key, ?string $defaultValue = null): ?string
    {
        $value = $this->getNullableString($data, $key, $defaultValue);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyString($data, $key, $defaultValue);
    }
}
