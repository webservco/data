<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Strict\JsonApi;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\JsonApiDataTrait;
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
#[UsesClass(StrictNonEmptyDataExtractionService::class)]
final class DataBooleanTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getBoolean
     */
    public function dataBooleanThrowsExceptionWhenNullWithoutDefaultValue(): void
    {
        $this->expectException(OutOfBoundsException::class);

        // No default value, should throw OutOfBoundsException
        $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getBoolean(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );
    }

    /**
     * @test getBoolean
     */
    public function dataBooleanValueMatches(): void
    {
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getBoolean(
            self::JSONAPI_DATA,
            'data/attributes/strict/booleanValue',
        );

        self::assertTrue($result);
    }

    /**
     * @test getBoolean
     */
    public function dataBooleanWorksWhenNullWithDefaultValue(): void
    {
        // Set default value as expected.
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getBoolean(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
            false,
        );

        self::assertFalse($result);
    }
}
