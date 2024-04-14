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
final class DataNullableTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNullableBoolean
     */
    public function nullableBooleanWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getNullableBoolean(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );

        self::assertNull($result);
    }

    /**
     * @test getNullableFloat
     */
    public function nullableFloatWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getNullableFloat(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );

        self::assertNull($result);
    }

    /**
     * @test getNullableInt
     */
    public function nullableIntWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getNullableInt(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );

        self::assertNull($result);
    }

    /**
     * @test getNullableString
     */
    public function nullableStringWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayDataExtractionService()->getNullableString(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );

        self::assertNull($result);
    }
}
