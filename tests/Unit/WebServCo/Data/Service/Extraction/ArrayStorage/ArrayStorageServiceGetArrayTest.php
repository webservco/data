<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\ArrayStorage;

use PHPUnit\Framework\Attributes\CoversClass;
use WebServCo\Data\Service\Extraction\ArrayStorageService;

#[CoversClass(ArrayStorageService::class)]
final class ArrayStorageServiceGetArrayTest extends AbstractArrayStorageServiceTester
{
    public function testArrayEmptyData(): void
    {
        // Config.

        // Setup.

        // Test.

        $result = $this->getService()->getArray(self::ARRAY_EMPTY, self::KEYS_ONE, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_EMPTY, $result);
    }

    public function testArrayEmptyKey(): void
    {
        // Config.

        // Setup.

        // Test.

        $result = $this->getService()->getArray(self::ARRAY_A, self::ARRAY_EMPTY, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_EMPTY, $result);
    }

    public function testArrayOne(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey(self::KEY_ONE);

        // Test.

        $result = $this->getService()->getArray(self::ARRAY_ONE, $keys, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_ONE_SUB, $result);
    }

    public function testArrayNotFound(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey(self::KEY_TWO);

        // Test.

        $result = $this->getService()->getArray(self::ARRAY_ONE, $keys, self::ARRAY_EMPTY);

        self::assertSame(self::ARRAY_EMPTY, $result);
    }
}
