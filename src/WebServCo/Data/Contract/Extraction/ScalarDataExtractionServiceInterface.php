<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ScalarDataExtractionServiceInterface
{
    /**
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
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
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
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
