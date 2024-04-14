<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Scalar\Loose;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\DataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage\AbstractWithoutTester;
use UnexpectedValueException;
use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;
use WebServCo\Data\Service\Extraction\AbstractScalarNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseNonEmptyDataExtractionService;

#[CoversClass(LooseNonEmptyDataExtractionService::class)]
#[UsesClass(AbstractScalarDataExtractionService::class)]
#[UsesClass(AbstractScalarNonEmptyDataExtractionService::class)]
#[UsesClass(DataExtractionContainer::class)]
#[UsesClass(DataExtractionContainerFactory::class)]
final class LooseNonEmptyDataExtractionServiceTest extends AbstractWithoutTester
{
    use DataTrait;

    public function testEmptyFloatDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getLooseNonEmptyDataExtractionService()
            ->getNonEmptyFloat(self::EMPTY_DATA['loose']['floatValue']);
    }

    public function testEmptyIntegerDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getLooseNonEmptyDataExtractionService()
            ->getNonEmptyInt(self::EMPTY_DATA['loose']['integerValue']);
    }

    public function testEmptyStringDoesNotWork(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->expectExceptionMessage('Data is empty.');

        $this->getDataExtractionContainer()->getLooseNonEmptyDataExtractionService()
            ->getNonEmptyString(self::EMPTY_DATA['loose']['stringValue']);
    }
}
