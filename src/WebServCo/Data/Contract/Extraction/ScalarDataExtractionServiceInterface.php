<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ScalarDataExtractionServiceInterface
{
    public function getBoolean(mixed $value): bool;

    public function getFloat(mixed $value): float;

    public function getInt(mixed $value): int;

    public function getString(mixed $value): string;

    public function getNullableBoolean(mixed $value): ?bool;

    public function getNullableFloat(mixed $value): ?float;

    public function getNullableInt(mixed $value): ?int;

    public function getNullableString(mixed $value): ?string;
}
