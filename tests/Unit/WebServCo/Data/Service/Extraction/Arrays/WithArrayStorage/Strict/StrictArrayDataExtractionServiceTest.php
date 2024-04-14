<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Strict;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\AbstractWithTester;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictNonEmptyDataExtractionService;

#[CoversClass(StrictArrayDataExtractionService::class)]
#[UsesClass(AbstractArrayDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
#[UsesClass(StrictDataExtractionService::class)]
#[UsesClass(StrictDataExtractionService::class)]
#[UsesClass(StrictNonEmptyDataExtractionService::class)]
final class StrictArrayDataExtractionServiceTest extends AbstractWithTester
{
    use DataTrait;

    public function testEmptyFloatWorks(): void
    {
        self::assertSame(
            0.00,
            $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()
                ->getFloat(self::EMPTY_DATA, 'strict/floatValue'),
        );
    }

    public function testEmptyIntegerWorks(): void
    {
        self::assertSame(
            0,
            $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()
                ->getInt(self::EMPTY_DATA, 'strict/integerValue'),
        );
    }

    public function testEmptyStringWorks(): void
    {
        self::assertSame(
            '',
            $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()
                ->getString(self::EMPTY_DATA, 'strict/stringValue'),
        );
    }
}
