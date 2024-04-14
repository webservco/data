<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Strict;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\AbstractWithTester;
use UnexpectedValueException;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictNonEmptyDataExtractionService;

#[CoversClass(StrictArrayNonEmptyDataExtractionService::class)]
#[UsesClass(AbstractArrayDataExtractionService::class)]
#[UsesClass(AbstractArrayNonEmptyDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(AbstractScalarNonEmptyDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
#[UsesClass(StrictDataExtractionService::class)]
#[UsesClass(StrictNonEmptyDataExtractionService::class)]
final class StrictArrayNonEmptyDataExtractionServiceTest extends AbstractWithTester
{
    use DataTrait;

    public function testEmptyFloatDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()
            ->getNonEmptyFloat(self::EMPTY_DATA, 'strict/floatValue');
    }

    public function testEmptyIntegerDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()
            ->getNonEmptyInt(self::EMPTY_DATA, 'strict/integerValue');
    }

    public function testEmptyStringDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()
            ->getNonEmptyString(self::EMPTY_DATA, 'strict/stringValue');
    }
}
