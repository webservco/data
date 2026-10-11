<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ScalarNonEmptyDataExtractionServiceInterface
{
    /**
     * @param mixed $value
     */
    public function getNonEmptyFloat($value): float;

    /**
     * @param mixed $value
     */
    public function getNonEmptyInt($value): int;

    /**
     * @param mixed $value
     */
    public function getNonEmptyString($value): string;

    /**
     * @param mixed $value
     */
    public function getNonEmptyNullableFloat($value): ?float;

    /**
     * @param mixed $value
     */
    public function getNonEmptyNullableInt($value): ?int;

    /**
     * @param mixed $value
     */
    public function getNonEmptyNullableString($value): ?string;
}
