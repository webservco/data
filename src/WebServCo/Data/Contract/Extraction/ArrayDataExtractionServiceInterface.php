<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayDataExtractionServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
    /**
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @param array<mixed> $data
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
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
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @param array<mixed> $data
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
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
