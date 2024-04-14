<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\Strict;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\AbstractWithoutTester;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictNonEmptyDataExtractionService;

#[CoversClass(StrictArrayDataExtractionService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
#[UsesClass(AbstractArrayDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(StrictDataExtractionService::class)]
#[UsesClass(StrictNonEmptyDataExtractionService::class)]
final class StrictArrayDataExtractionServiceTest extends AbstractWithoutTester
{
    use DataTrait;

    /**
     * @test getFloat
     */
    public function floatWorks(): void
    {
        self::assertSame(
            0.00,
            $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()
                ->getFloat(self::EMPTY_DATA['strict'], 'floatValue'),
        );
    }

    /**
     * @test getInt
     */
    public function intWorks(): void
    {
        self::assertSame(
            0,
            $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()
                ->getInt(self::EMPTY_DATA['strict'], 'integerValue'),
        );
    }

    /**
     * @test getString
     */
    public function stringWorks(): void
    {
        self::assertSame(
            '',
            $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()
                ->getString(self::EMPTY_DATA['strict'], 'stringValue'),
        );
    }
}
