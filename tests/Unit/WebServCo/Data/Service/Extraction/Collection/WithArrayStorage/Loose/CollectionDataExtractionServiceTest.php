<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Collection\WithArrayStorage\Loose;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\Traits\CollectionDataTrait;
use UnexpectedValueException;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\CollectionDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseDataExtractionService;

/**
 * Loose, with the array storage service: every scalar item is cast; the shape of the data is checked as in strict.
 *
 * PhanRedefinedExtendedClass: PHPUnit's TestCase is also declared in the stubs of rector.
 *
 * @suppress PhanRedefinedExtendedClass
 */
#[CoversClass(CollectionDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(LooseDataExtractionService::class)]
final class CollectionDataExtractionServiceTest extends TestCase
{
    use CollectionDataTrait;

    public function testGetIntListCastsItems(): void
    {
        self::assertSame([3, 7], $this->createService()->getIntList(self::COLLECTION_DATA, 'user/groupIdsAsText'));
    }

    public function testGetStringListCastsItems(): void
    {
        self::assertSame(
            ['1', '2.5', '1'],
            $this->createService()->getStringList(self::COLLECTION_DATA, 'user/mixedValues'),
        );
    }

    public function testGetStringMapCastsItems(): void
    {
        self::assertSame(['pages' => '10'], $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/limits'));
    }

    public function testGetIntListThrowsForItemThatIsNotScalar(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data type is different than expected: "user/groups", item "0".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/groups');
    }

    public function testGetIntListThrowsForMap(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not a list: "user/limits".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/limits');
    }

    public function testGetStringListThrowsForValueThatIsNotArray(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not an array: "user/name".');

        $this->createService()->getStringList(self::COLLECTION_DATA, 'user/name');
    }

    public function testGetStringMapThrowsForNumericKeys(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data is not a map with string keys: "user/numberedNames".');

        $this->createService()->getStringMap(self::COLLECTION_DATA, 'user/numberedNames');
    }

    private function createService(): CollectionDataExtractionService
    {
        return new CollectionDataExtractionService(new ArrayStorageService(), new LooseDataExtractionService());
    }
}
