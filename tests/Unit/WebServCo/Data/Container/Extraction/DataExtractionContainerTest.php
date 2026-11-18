<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Container\Extraction;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\Traits\CollectionDataTrait;
use UnexpectedValueException;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\CollectionDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;

/**
 * The collection services of the container: strict or loose, with the array storage setting of the container.
 *
 * PhanRedefinedExtendedClass: PHPUnit's TestCase is also declared in the stubs of rector.
 *
 * @suppress PhanRedefinedExtendedClass
 */
#[CoversClass(DataExtractionContainer::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(CollectionDataExtractionService::class)]
#[UsesClass(LooseDataExtractionService::class)]
#[UsesClass(StrictDataExtractionService::class)]
final class DataExtractionContainerTest extends TestCase
{
    use CollectionDataTrait;

    public function testTheStrictCollectionServiceFollowsAPath(): void
    {
        $dataExtractionContainer = new DataExtractionContainer(true);

        self::assertSame(
            [3, 7],
            $dataExtractionContainer->getStrictCollectionDataExtractionService()
                ->getIntList(self::COLLECTION_DATA, 'user/groupIds'),
        );
    }

    public function testTheStrictCollectionServiceDoesNotCast(): void
    {
        $dataExtractionContainer = new DataExtractionContainer(true);

        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessageIs('Data type is different than expected: "user/groupIdsAsText", item "0".');

        $dataExtractionContainer->getStrictCollectionDataExtractionService()
            ->getIntList(self::COLLECTION_DATA, 'user/groupIdsAsText');
    }

    public function testTheLooseCollectionServiceCasts(): void
    {
        $dataExtractionContainer = new DataExtractionContainer(true);

        self::assertSame(
            [3, 7],
            $dataExtractionContainer->getLooseCollectionDataExtractionService()
                ->getIntList(self::COLLECTION_DATA, 'user/groupIdsAsText'),
        );
    }

    public function testWithoutArrayStorageAKeyIsAKeyOfTheFirstLevel(): void
    {
        $dataExtractionContainer = new DataExtractionContainer(false);
        $collectionDataExtractionService = $dataExtractionContainer->getStrictCollectionDataExtractionService();

        self::assertSame(
            [3, 7],
            $collectionDataExtractionService->getIntList(self::COLLECTION_DATA['user'], 'groupIds'),
        );

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageIs('Data not found: "user/groupIds".');

        $collectionDataExtractionService->getIntList(self::COLLECTION_DATA, 'user/groupIds');
    }

    public function testEachCollectionServiceIsCreatedOnce(): void
    {
        $dataExtractionContainer = new DataExtractionContainer(true);
        $loose = $dataExtractionContainer->getLooseCollectionDataExtractionService();
        $strict = $dataExtractionContainer->getStrictCollectionDataExtractionService();

        self::assertSame($loose, $dataExtractionContainer->getLooseCollectionDataExtractionService());
        self::assertSame($strict, $dataExtractionContainer->getStrictCollectionDataExtractionService());
        self::assertNotSame($loose, $strict);
    }
}
