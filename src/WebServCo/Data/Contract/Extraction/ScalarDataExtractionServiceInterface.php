<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ScalarDataExtractionServiceInterface
{
    /**
     * @param mixed $value
     */
    public function getBoolean($value): bool;

    /**
     * @param mixed $value
     */
    public function getFloat($value): float;

    /**
     * @param mixed $value
     */
    public function getInt($value): int;

    /**
     * @param mixed $value
     */
    public function getString($value): string;

    /**
     * @param mixed $value
     */
    public function getNullableBoolean($value): ?bool;

    /**
     * @param mixed $value
     */
    public function getNullableFloat($value): ?float;

    /**
     * @param mixed $value
     */
    public function getNullableInt($value): ?int;

    /**
     * @param mixed $value
     */
    public function getNullableString($value): ?string;
}
