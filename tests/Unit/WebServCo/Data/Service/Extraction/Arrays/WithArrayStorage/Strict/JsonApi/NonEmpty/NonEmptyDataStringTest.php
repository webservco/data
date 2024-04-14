<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Strict\JsonApi\NonEmpty;

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
final class NonEmptyDataStringTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNonEmptyString
     */
    public function dataNonEmptyStringThrowsExceptionWhenNullWithoutDefaultValue(): void
    {
        $this->expectException(OutOfBoundsException::class);

        // No default value, should throw OutOfBoundsException
        $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()->getNonEmptyString(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );
    }

    /**
     * @test getNonEmptyString
     */
    public function dataNonEmptyStringValueMatches(): void
    {
        $result = $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()->getNonEmptyString(
            self::JSONAPI_DATA,
            'data/attributes/strict/stringValue',
        );

        self::assertSame('99', $result);
    }

    /**
     * @test getNonEmptyString
     */
    public function dataNonEmptyStringWorksWhenNullWithDefaultValue(): void
    {
        $defaultValue = 'string';

        // Set default value as expected.
        $result = $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()->getNonEmptyString(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
            $defaultValue,
        );

        self::assertSame($defaultValue, $result);
    }
}
