<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Scalar\Strict;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\AbstractWithoutTester;
use UnexpectedValueException;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictNonEmptyDataExtractionService;

#[CoversClass(StrictNonEmptyDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(AbstractScalarNonEmptyDataExtractionService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
final class StrictNonEmptyDataExtractionServiceTest extends AbstractWithoutTester
{
    use DataTrait;

    public function testEmptyFloatDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getStrictNonEmptyDataExtractionService()
            ->getNonEmptyFloat(self::EMPTY_DATA['strict']['floatValue']);
    }

    public function testEmptyIntegerDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getStrictNonEmptyDataExtractionService()
            ->getNonEmptyInt(self::EMPTY_DATA['strict']['integerValue']);
    }

    public function testEmptyStringDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getStrictNonEmptyDataExtractionService()
            ->getNonEmptyString(self::EMPTY_DATA['strict']['stringValue']);
    }
}
