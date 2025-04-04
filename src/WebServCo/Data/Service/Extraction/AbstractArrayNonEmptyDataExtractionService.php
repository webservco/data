<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use Override;
use WebServCo\Data\Contract\Extraction\ArrayNonEmptyDataExtractionServiceInterface;

abstract class AbstractArrayNonEmptyDataExtractionService extends AbstractArrayDataExtractionService implements
    ArrayNonEmptyDataExtractionServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyFloat(array $data, string $key, ?float $defaultValue = null): float
    {
        $value = $this->getFloat($data, $key, $defaultValue);
        return $this->scalarNonEmptyDataExtractionService->getNonEmptyFloat($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyInt(array $data, string $key, ?int $defaultValue = null): int
    {
        $value = $this->getInt($data, $key, $defaultValue);
        return $this->scalarNonEmptyDataExtractionService->getNonEmptyInt($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyString(array $data, string $key, ?string $defaultValue = null): string
    {
        $value = $this->getString($data, $key, $defaultValue);
        return $this->scalarNonEmptyDataExtractionService->getNonEmptyString($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float
    {
        $value = $this->getNullableFloat($data, $key, $defaultValue);
        return $this->scalarNonEmptyDataExtractionService->getNonEmptyNullableFloat($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyNullableInt(array $data, string $key, ?int $defaultValue = null): ?int
    {
        $value = $this->getNullableInt($data, $key, $defaultValue);
        return $this->scalarNonEmptyDataExtractionService->getNonEmptyNullableInt($value);
    }

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyNullableString(array $data, string $key, ?string $defaultValue = null): ?string
    {
        $value = $this->getNullableString($data, $key, $defaultValue);
        return $this->scalarNonEmptyDataExtractionService->getNonEmptyNullableString($value);
    }

    // @phpcs:enable
}
