<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayDataExtractionServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
    /**
     * @param array<mixed> $data
     */
    public function getBoolean(array $data, string $key, ?bool $defaultValue = null): bool;

    /**
     * @param array<mixed> $data
     */
    public function getFloat(array $data, string $key, ?float $defaultValue = null): float;

    /**
     * @param array<mixed> $data
     */
    public function getInt(array $data, string $key, ?int $defaultValue = null): int;

    /**
     * @param array<mixed> $data
     */
    public function getString(array $data, string $key, ?string $defaultValue = null): string;

    /**
     * @param array<mixed> $data
     */
    public function getNullableBoolean(array $data, string $key, ?bool $defaultValue = null): ?bool;

    /**
     * @param array<mixed> $data
     */
    public function getNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float;

    /**
     * @param array<mixed> $data
     */
    public function getNullableInt(array $data, string $key, ?int $defaultValue = null): ?int;

    /**
     * @param array<mixed> $data
     */
    public function getNullableString(array $data, string $key, ?string $defaultValue = null): ?string;
    // @phpcs:enable
}
