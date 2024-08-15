<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use WebServCo\Data\Contract\Extraction\ArrayStorageServiceInterface;

use function array_key_exists;
use function array_shift;
use function explode;
use function is_array;

final class ArrayStorageService implements ArrayStorageServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint

    private const DIVIDER = '/';

    /**
     * @param array<mixed> $data
     * @param array<int,string> $keys
     */
    // phpcs:ignore SlevomatCodingStandard.Complexity.Cognitive.ComplexityTooHigh
    public function get(array $data, array $keys, mixed $defaultValue): mixed
    {
        // Handle empty storage.
        if ($data === []) {
            return $defaultValue;
        }

        // Handle empty keys.
        if ($keys === []) {
            return $defaultValue;
        }

        // Check first element.
        if (array_key_exists(0, $keys) && array_key_exists($keys[0], $data)) {
            // Remove first element.
            $currentKey = array_shift($keys);

            // At the end of the recursion $keys will be an empty array.
            // In that case, we have arrived at the end.
            if ($keys === []) {
                if (array_key_exists($currentKey, $data)) {
                    return $data[$currentKey];
                }

                return $defaultValue;
            }

            // Check array conditions.
            if (is_array($data[$currentKey])) {
                // Go down one level and call the method again.
                return $this->get($data[$currentKey], $keys, $defaultValue);
            }
        }

        // If we arrive here, data is not found.
        return $defaultValue;
    }

    /**
     * @param array<mixed> $data
     * @param array<int,string> $keys
     * @param array<mixed> $defaultValue
     * @return array<mixed>
     */
    public function getArray(array $data, array $keys, array $defaultValue = []): array
    {
        $result = $this->get($data, $keys, $defaultValue);

        if (!is_array($result)) {
            return $defaultValue;
        }

        return $result;
    }

    /**
     * @return array<int,string>
     */
    public function parseKey(string $key): array
    {
        return explode(self::DIVIDER, $key);
    }

    // @phpcs:enable
}
