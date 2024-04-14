<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Loose;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\AbstractWithTester;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\Loose\LooseArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseNonEmptyDataExtractionService;

#[CoversClass(LooseArrayDataExtractionService::class)]
#[UsesClass(AbstractArrayDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
#[UsesClass(LooseDataExtractionService::class)]
#[UsesClass(LooseNonEmptyDataExtractionService::class)]
final class LooseArrayDataExtractionServiceTest extends AbstractWithTester
{
    use DataTrait;

    public function testEmptyFloatWorks(): void
    {
        self::assertSame(
            0.00,
            $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()
            ->getFloat(self::EMPTY_DATA, 'loose/floatValue'),
        );
    }

    public function testEmptyIntegerWorks(): void
    {
        self::assertSame(
            0,
            $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()
                ->getInt(self::EMPTY_DATA, 'loose/integerValue'),
        );
    }

    public function testEmptyStringWorks(): void
    {
        self::assertSame(
            '',
            $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()
            ->getString(self::EMPTY_DATA, 'loose/stringValue'),
        );
    }
}
