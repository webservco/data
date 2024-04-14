<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\Loose;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\AbstractWithoutTester;
use UnexpectedValueException;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\Loose\LooseArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseNonEmptyDataExtractionService;

#[CoversClass(LooseArrayNonEmptyDataExtractionService::class)]
#[UsesClass(AbstractArrayDataExtractionService::class)]
#[UsesClass(AbstractArrayNonEmptyDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(AbstractScalarNonEmptyDataExtractionService::class)]
#[UsesClass(ArrayStorageService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
#[UsesClass(LooseDataExtractionService::class)]
#[UsesClass(LooseNonEmptyDataExtractionService::class)]
final class LooseArrayNonEmptyDataExtractionServiceTest extends AbstractWithoutTester
{
    use DataTrait;

    public function testEmptyFloatDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()
            ->getNonEmptyString(self::EMPTY_DATA['loose'], 'stringValue');
    }

    public function testEmptyIntegerDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()
            ->getNonEmptyString(self::EMPTY_DATA['loose'], 'stringValue');
    }

    public function testEmptyStringDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()
            ->getNonEmptyString(self::EMPTY_DATA['loose'], 'stringValue');
    }
}
