<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\ArrayStorage;

use PHPUnit\Framework\Attributes\CoversClass;
use WebServCo\Data\Service\Extraction\ArrayStorageService;

#[CoversClass(ArrayStorageService::class)]
final class ArrayStorageServiceGetTest extends AbstractArrayStorageServiceTester
{
    public function testArrayEmptyData(): void
    {
        // Config.

        // Setup.

        // Test.

        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $result = $this->getService()->get(self::ARRAY_EMPTY, self::KEYS_ONE, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_EMPTY, $result);
    }

    public function testArrayEmptyKey(): void
    {
        // Config.

        // Setup.

        // Test.

        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $result = $this->getService()->get(self::ARRAY_A, self::ARRAY_EMPTY, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_EMPTY, $result);
    }

    public function testArrayOne(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey(self::KEY_ONE);

        // Test.

        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $result = $this->getService()->get(self::ARRAY_ONE, $keys, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_ONE_SUB, $result);
    }

    public function testArrayNotFound(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey(self::KEY_TWO);

        // Test.

        /**
         * Psalm error: "Unable to determine the type that $.. is being assigned to"
         * However this is indeed mixed, no solution but to suppress error.
         *
         * @psalm-suppress MixedAssignment
         */
        $result = $this->getService()->get(self::ARRAY_ONE, $keys, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_EMPTY, $result);
    }
}
