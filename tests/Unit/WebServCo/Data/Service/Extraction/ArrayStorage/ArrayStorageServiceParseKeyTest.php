<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\ArrayStorage;

use PHPUnit\Framework\Attributes\CoversClass;
use WebServCo\Data\Service\Extraction\ArrayStorageService;

#[CoversClass(ArrayStorageService::class)]
final class ArrayStorageServiceParseKeyTest extends AbstractArrayStorageServiceTester
{
    public function testParseKeyABC(): void
    {
        // Config.

        // Setup.

        $service = $this->getService();

        // Test.

        $result = $service->parseKey(self::ABC_KEY);

        self::assertSame(self::ABC_KEYS, $result);
    }
}
