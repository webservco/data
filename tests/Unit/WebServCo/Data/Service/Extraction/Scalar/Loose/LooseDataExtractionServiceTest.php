<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Scalar\Loose;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\AbstractWithoutTester;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseDataExtractionService;

#[CoversClass(LooseDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
final class LooseDataExtractionServiceTest extends AbstractWithoutTester
{
    use DataTrait;

    /**
     * @test getFloat
     */
    public function floatWorks(): void
    {
        self::assertSame(
            0.00,
            $this->getDataExtractionContainer()->getLooseDataExtractionService()
                ->getFloat(self::EMPTY_DATA['loose']['floatValue']),
        );
    }

    /**
     * @test getInt
     */
    public function intWorks(): void
    {
        self::assertSame(
            0,
            $this->getDataExtractionContainer()->getLooseDataExtractionService()
                ->getInt(self::EMPTY_DATA['loose']['integerValue']),
        );
    }

    /**
     * @test getString
     */
    public function stringWorks(): void
    {
        self::assertSame(
            '',
            $this->getDataExtractionContainer()->getLooseDataExtractionService()
                ->getString(self::EMPTY_DATA['loose']['stringValue']),
        );
    }
}
