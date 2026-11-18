<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Collection\WithoutArrayStorage\Strict;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\Traits\CollectionDataTrait;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\CollectionDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;

/**
 * Strict, without the array storage service: a key is a key of the first level, never a path.
 *
 * PhanRedefinedExtendedClass: PHPUnit's TestCase is also declared in the stubs of rector.
 *
 * @suppress PhanRedefinedExtendedClass
 */
#[CoversClass(CollectionDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(StrictDataExtractionService::class)]
final class CollectionDataExtractionServiceTest extends TestCase
{
    use CollectionDataTrait;

    public function testGetArrayWorks(): void
    {
        self::assertSame(
            self::COLLECTION_DATA['user'],
            $this->createService()->getArray(self::COLLECTION_DATA, 'user'),
        );
    }

    public function testGetIntListWorks(): void
    {
        self::assertSame(
            [3, 7],
            $this->createService()->getIntList(self::COLLECTION_DATA['user'], 'groupIds'),
        );
    }

    public function testKeyWithSlashIsOneKey(): void
    {
        self::assertSame(
            ['admin'],
            $this->createService()->getStringList(['user/roles' => ['admin']], 'user/roles'),
        );
    }

    public function testPathIsNotFollowed(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/groupIds".');

        $this->createService()->getIntList(self::COLLECTION_DATA, 'user/groupIds');
    }

    public function testGetStringMapReturnsDefaultForMissingKey(): void
    {
        self::assertSame(
            ['theme' => 'light'],
            $this->createService()->getStringMap(self::COLLECTION_DATA, 'settings', ['theme' => 'light']),
        );
    }

    private function createService(): CollectionDataExtractionService
    {
        return new CollectionDataExtractionService(null, new StrictDataExtractionService());
    }
}
