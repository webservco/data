<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Loose\JsonApi\NonEmpty;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\JsonApiDataTrait;
use Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\AbstractWithTester;
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
final class NonEmptyDataIntTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNonEmptyInt
     */
    public function dataNonEmptyIntThrowsExceptionWhenNullWithoutDefaultValue(): void
    {
        $this->expectException(OutOfBoundsException::class);

        // No default value, should throw OutOfBoundsException
        $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()->getNonEmptyInt(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );
    }

    /**
     * @test getNonEmptyInt
     */
    public function dataNonEmptyIntValueMatches(): void
    {
        $result = $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()->getNonEmptyInt(
            self::JSONAPI_DATA,
            'data/attributes/loose/integerValue',
        );

        self::assertSame(138, $result);
    }

    /**
     * @test getNonEmptyInt
     */
    public function dataNonEmptyIntWorksWhenNullWithDefaultValue(): void
    {
        $defaultValue = 99;

        // Set default value as expected.
        $result = $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()->getNonEmptyInt(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
            $defaultValue,
        );

        self::assertSame($defaultValue, $result);
    }
}
