<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface ArrayStorageServiceInterface
{
    // @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
    /**
     * @param array<mixed> $data
     * @param array<int,string> $keys
     * @param mixed $defaultValue
     * @return mixed
     */
    public function get(array $data, array $keys, $defaultValue);

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
