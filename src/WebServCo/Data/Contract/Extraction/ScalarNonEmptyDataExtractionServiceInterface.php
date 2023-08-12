<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ScalarNonEmptyDataExtractionServiceInterface
{
    public function getNonEmptyFloat(mixed $value): float;

    public function getNonEmptyInt(mixed $value): int;

    public function getNonEmptyString(mixed $value): string;

    public function getNonEmptyNullableFloat(mixed $value): ?float;

    public function getNonEmptyNullableInt(mixed $value): ?int;

    public function getNonEmptyNullableString(mixed $value): ?string;
}
