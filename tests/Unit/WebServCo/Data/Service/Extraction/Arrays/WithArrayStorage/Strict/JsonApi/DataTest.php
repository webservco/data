<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Strict\JsonApi;

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
final class DataTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNullableBoolean
     */
    public function dataNullValueMatches(): void
    {
        // Use `false` as defaultValue to be able to check the result.
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getNullableBoolean(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
            false,
        );

        self::assertNull($result);
    }

    /**
     * @test getNullableBoolean
     */
    public function errorsIsNull(): void
    {
        // Config.

        // Setup.

        // Test.

        /**
         * This is actually a workaround, since errors can be an array.
         * We test for a nullable boolean with default value false.
         * Result should be null.
         */
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getNullableBoolean(
            self::JSONAPI_DATA,
            'errors',
            false,
        );

        self::assertNull($result);
    }
}
