<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayStorageServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint

    /**
     * @param array<mixed> $data
     * @param array<int,string> $keys
     */
    public function get(array $data, array $keys, mixed $defaultValue,): mixed;

    /**
     * @param array<mixed> $data
     * @param array<int,string> $keys
     * @param array<mixed> $defaultValue
     * @return array<mixed>
     */
    public function getArray(array $data, array $keys, array $defaultValue = []): array;

    /**
     * @return array<int,string>
     */
    public function parseKey(string $key): array;

    // @phpcs:enable
}
