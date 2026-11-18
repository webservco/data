<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

/**
 * Typed lists and maps from mixed data: the value of a key is an array, and every item gets a type.
 *
 * Strict or loose by the scalar service the implementation is given.
 * A missing key, or a null value, gives the default when one is given, and otherwise an `OutOfBoundsException`.
 * A value or an item of another type gives an `UnexpectedValueException`.
 */
interface CollectionDataExtractionServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint

    /**
     * The array as it is: a list or a map.
     *
     * @param array<mixed> $data
     * @param array<mixed>|null $defaultValue
     * @return array<mixed>
     */
    public function getArray(array $data, string $key, ?array $defaultValue = null): array;

    /**
     * @param array<mixed> $data
     * @param list<int>|null $defaultValue
     * @return list<int>
     */
    public function getIntList(array $data, string $key, ?array $defaultValue = null): array;

    /**
     * @param array<mixed> $data
     * @param list<string>|null $defaultValue
     * @return list<string>
     */
    public function getStringList(array $data, string $key, ?array $defaultValue = null): array;

    /**
     * Every key must be a string.
     * PHP makes a numeric key such as "1" an int, so such a map is not accepted.
     *
     * @param array<mixed> $data
     * @param array<string,string>|null $defaultValue
     * @return array<string,string>
     */
    public function getStringMap(array $data, string $key, ?array $defaultValue = null): array;

    // @phpcs:enable
}
