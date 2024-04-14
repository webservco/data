<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\ArrayStorage;

use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\Assets\Traits\JsonApiDataTrait;
use WebServCo\Data\Service\Extraction\ArrayStorageService;

#[CoversClass(ArrayStorageService::class)]
final class ArrayStorageServiceGetJsonApiTest extends AbstractArrayStorageServiceTester
{
    use JsonApiDataTrait;

    public function testDataIsArray(): void
    {
        // Config.

        // Setup.

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, ['data'], null);

        self::assertIsArray($result);
    }

    public function testErrorsIsNull(): void
    {
        // Config.

        // Setup.

        // Test

        // Use `false` as defaultValue to be able to check the result.
        $result = $this->getService()->get(self::JSONAPI_DATA, ['errors'], false);

        self::assertNull($result);
    }

    public function testJsonApiVersionMatches(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('jsonapi/version');

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, null);

        self::assertSame('1.1', $result);
    }

    public function testMetaVersionMatches(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('meta/version');

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, null);

        self::assertSame('v1', $result);
    }

    public function testValueIsBoolean(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('data/attributes/strict/booleanValue');

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, null);

        self::assertIsBool($result);
    }

    public function testValueIsFloat(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('data/attributes/strict/floatValue');

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, null);

        self::assertIsFloat($result);
    }

    public function testValueIsInt(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('data/attributes/strict/integerValue');

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, null);

        self::assertIsInt($result);
    }

    public function testValueIsNull(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('data/attributes/nullValue');

        // Test.

        // Use `false` as default value to verify result.
        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, false);

        self::assertNull($result);
    }

    public function testValueIsString(): void
    {
        // Config.

        // Setup.

        $keys = $this->getService()->parseKey('data/attributes/strict/stringValue');

        // Test.

        $result = $this->getService()->get(self::JSONAPI_DATA, $keys, null);

        self::assertSame('99', $result);
    }
}
