<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Scalar\Strict;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\AbstractWithoutTester;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;

#[CoversClass(StrictDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
final class StrictDataExtractionServiceTest extends AbstractWithoutTester
{
    use DataTrait;

    /**
     * @test getFloat
     */
    public function floatWorks(): void
    {
        self::assertSame(
            0.00,
            $this->getDataExtractionContainer()->getStrictDataExtractionService()
                ->getFloat(self::EMPTY_DATA['strict']['floatValue']),
        );
    }

    /**
     * @test getInt
     */
    public function intWorks(): void
    {
        self::assertSame(
            0,
            $this->getDataExtractionContainer()->getStrictDataExtractionService()
                ->getInt(self::EMPTY_DATA['strict']['integerValue']),
        );
    }

    /**
     * @test getString
     */
    public function stringWorks(): void
    {
        self::assertSame(
            '',
            $this->getDataExtractionContainer()->getStrictDataExtractionService()
                ->getString(self::EMPTY_DATA['strict']['stringValue']),
        );
    }
}
