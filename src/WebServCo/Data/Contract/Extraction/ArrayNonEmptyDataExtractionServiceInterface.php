<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayNonEmptyDataExtractionServiceInterface
{
    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyFloat(array $data, string $key, ?float $defaultValue = null): float;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyInt(array $data, string $key, ?int $defaultValue = null): int;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyString(array $data, string $key, ?string $defaultValue = null): string;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyNullableInt(array $data, string $key, ?int $defaultValue = null): ?int;

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyNullableString(array $data, string $key, ?string $defaultValue = null): ?string;
}
