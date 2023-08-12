<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayNonEmptyDataExtractionServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyFloat(array $data, string $key, ?float $defaultValue = null): float;

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyInt(array $data, string $key, ?int $defaultValue = null): int;

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyString(array $data, string $key, ?string $defaultValue = null): string;

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float;

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyNullableInt(array $data, string $key, ?int $defaultValue = null): ?int;

    /**
     * @param array<mixed> $data
     */
    public function getNonEmptyNullableString(array $data, string $key, ?string $defaultValue = null): ?string;
    // @phpcs:enable
}
