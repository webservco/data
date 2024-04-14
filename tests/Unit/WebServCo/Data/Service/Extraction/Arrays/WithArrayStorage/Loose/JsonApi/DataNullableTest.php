<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Loose\JsonApi;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Tests\Unit\Assets\Traits\JsonApiDataTrait;
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
final class DataNullableTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNullableBoolean
     */
    public function nullableBooleanWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getNullableBoolean(
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
        $result = $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getNullableFloat(
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
        $result = $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getNullableInt(
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
        $result = $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getNullableString(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );

        self::assertNull($result);
    }
}
