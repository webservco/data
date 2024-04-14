<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Strict\JsonApi\NonEmpty;

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
final class NonEmptyDataNullableTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNonEmptyNullableFloat
     */
    public function nonEmptyNullableFloatWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()
            ->getNonEmptyNullableFloat(self::JSONAPI_DATA, 'data/attributes/nullValue');

        self::assertNull($result);
    }

    /**
     * @test getNonEmptyNullableInt
     */
    public function nonEmptyNullableIntWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()
            ->getNonEmptyNullableInt(self::JSONAPI_DATA, 'data/attributes/nullValue');

        self::assertNull($result);
    }

    /**
     * @test getNonEmptyNullableString
     */
    public function nonEmptyNullableStringWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getStrictArrayNonEmptyDataExtractionService()
            ->getNonEmptyNullableString(self::JSONAPI_DATA, 'data/attributes/nullValue');

        self::assertNull($result);
    }
}
