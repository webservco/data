<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Collection\WithArrayStorage\Strict;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\Traits\CollectionDataTrait;
use UnexpectedValueException;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\CollectionDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;

/**
 * Strict, with the array storage service: a key can be a path.
 *
 * PhanRedefinedExtendedClass: PHPUnit's TestCase is also declared in the stubs of rector.
 *
 * @suppress PhanRedefinedExtendedClass
 */
#[CoversClass(CollectionDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(StrictDataExtractionService::class)]
final class CollectionDataExtractionServiceTest extends TestCase
{
    use CollectionDataTrait;

    public function testGetArrayReturnsListAsItIs(): void
    {
        self::assertSame(['admin', 'editor'], $this->createService()->getArray(self::COLLECTION_DATA, 'user/roles'));
    }

    public function testGetArrayReturnsMapAsItIs(): void
    {
        self::assertSame(
            ['language' => 'ro', 'theme' => 'dark'],
            $this->createService()->getArray(self::COLLECTION_DATA, 'user/settings'),
        );
    }

    public function testGetArrayReturnsListOfArrays(): void
    {
        self::assertSame(
            [['id' => 3], ['id' => 7]],
            $this->createService()->getArray(self::COLLECTION_DATA, 'user/groups'),
        );
    }

    public function testGetArrayReturnsDefaultForMissingKey(): void
    {
        self::assertSame([], $this->createService()->getArray(self::COLLECTION_DATA, 'user/missing', []));
    }

    public function testGetArrayReturnsDefaultForNullValue(): void
    {
        self::assertSame(['guest'], $this->createService()->getArray(self::COLLECTION_DATA, 'user/nothing', ['guest']));
    }

    public function testGetArrayThrowsForMissingKey(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/missing".');

        $this->createService()->getArray(self::COLLECTION_DATA, 'user/missing');
    }

    public function testGetArrayThrowsForNullValue(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/nothing".');

        $this->createService()->getArray(self::COLLECTION_DATA, 'user/nothing');
    }

    public function testGetArrayThrowsForValueThatIsNotArray(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not an array: "user/name".');

        $this->createService()->getArray(self::COLLECTION_DATA, 'user/name');
    }

    public function testGetIntListWorks(): void
    {
        self::assertSame([3, 7], $this->createService()->getIntList(self::COLLECTION_DATA, 'user/groupIds'));
    }

    public function testGetIntListOfEmptyArrayWorks(): void
    {
        self::assertSame([], $this->createService()->getIntList(self::COLLECTION_DATA, 'user/emptyArray'));
    }

    public function testGetIntListReturnsDefaultForMissingKey(): void
    {
        self::assertSame([1], $this->createService()->getIntList(self::COLLECTION_DATA, 'user/missing', [1]));
    }

    public function testGetIntListThrowsForMissingKey(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/missing".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/missing');
    }

    public function testGetIntListThrowsForValueThatIsNotArray(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not an array: "user/name".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/name');
    }

    public function testGetIntListThrowsForMap(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not a list: "user/settings".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/settings');
    }

    public function testGetIntListThrowsForItemOfOtherType(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data type is different than expected: "user/groupIdsAsText", item "0".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/groupIdsAsText');
    }

    public function testItemOfOtherTypeKeepsExceptionOfScalarService(): void
    {
        try {
            $this->createService()->getIntList(self::COLLECTION_DATA, 'user/groupIdsAsText');
        } catch (UnexpectedValueException $exception) {
            $previous = $exception->getPrevious();
            if (!$previous instanceof UnexpectedValueException) {
                self::fail('The exception of the scalar service is not kept.');
            }
            self::assertSame('Data type is different than expected.', $previous->getMessage());

            return;
        }

        self::fail('No exception was thrown.');
    }

    public function testGetStringListWorks(): void
    {
        self::assertSame(
            ['admin', 'editor'],
            $this->createService()->getStringList(self::COLLECTION_DATA, 'user/roles'),
        );
    }

    public function testGetStringListReturnsDefaultForMissingKey(): void
    {
        self::assertSame(
            ['guest'],
            $this->createService()->getStringList(self::COLLECTION_DATA, 'user/missing', ['guest']),
        );
    }

    public function testGetStringListThrowsForMissingKey(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/missing".');

        $this->createService()->getStringList(self::COLLECTION_DATA, 'user/missing');
    }

    public function testGetStringListThrowsForItemOfOtherType(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data type is different than expected: "user/mixedValues", item "0".');

        $this->createService()->getStringList(self::COLLECTION_DATA, 'user/mixedValues');
    }

    public function testGetStringMapWorks(): void
    {
        self::assertSame(
            ['language' => 'ro', 'theme' => 'dark'],
            $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/settings'),
        );
    }

    public function testGetStringMapOfEmptyArrayWorks(): void
    {
        self::assertSame([], $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/emptyArray'));
    }

    public function testGetStringMapReturnsDefaultForMissingKey(): void
    {
        self::assertSame(
            ['theme' => 'light'],
            $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/missing', ['theme' => 'light']),
        );
    }

    public function testGetStringMapThrowsForMissingKey(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/missing".');

        $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/missing');
    }

    public function testGetStringMapThrowsForList(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not a map with string keys: "user/roles".');

        $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/roles');
    }

    public function testGetStringMapThrowsForNumericKeys(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not a map with string keys: "user/numberedNames".');

        $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/numberedNames');
    }

    public function testGetStringMapThrowsForItemOfOtherType(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data type is different than expected: "user/limits", item "pages".');

        $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/limits');
    }

    private function createService(): CollectionDataExtractionService
    {
        return new CollectionDataExtractionService(new ArrayStorageService(), new StrictDataExtractionService());
    }
}
