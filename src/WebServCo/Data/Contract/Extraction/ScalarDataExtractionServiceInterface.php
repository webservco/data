<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ScalarDataExtractionServiceInterface
{
    /**
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
     */
    public function getBoolean(mixed $value): bool;

    public function getFloat(mixed $value): float;

    public function getInt(mixed $value): int;

    public function getString(mixed $value): string;

    /**
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
     */
    public function getNullableBoolean(mixed $value): ?bool;

    public function getNullableFloat(mixed $value): ?float;

    public function getNullableInt(mixed $value): ?int;

    public function getNullableString(mixed $value): ?string;
}
