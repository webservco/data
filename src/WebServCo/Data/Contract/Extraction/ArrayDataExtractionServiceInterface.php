<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayDataExtractionServiceInterface
{
    /**
     * @param array<string,scalar|null> $data
     */
    public function getBoolean(array $data, string $key, ?bool $defaultValue = null): bool;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getFloat(array $data, string $key, ?float $defaultValue = null): float;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getInt(array $data, string $key, ?int $defaultValue = null): int;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getString(array $data, string $key, ?string $defaultValue = null): string;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableBoolean(array $data, string $key, ?bool $defaultValue = null): ?bool;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableInt(array $data, string $key, ?int $defaultValue = null): ?int;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableString(array $data, string $key, ?string $defaultValue = null): ?string;
}
