<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Loose\JsonApi\NonEmpty;

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
final class NonEmptyDataNullableTest extends AbstractWithTester
{
    use JsonApiDataTrait;

    /**
     * @test getNonEmptyNullableFloat
     */
    public function nonEmptyNullableFloatWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()
            ->getNonEmptyNullableFloat(self::JSONAPI_DATA, 'data/attributes/nullValue');

        self::assertNull($result);
    }

    /**
     * @test getNonEmptyNullableInt
     */
    public function nonEmptyNullableIntWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()
            ->getNonEmptyNullableInt(self::JSONAPI_DATA, 'data/attributes/nullValue');

        self::assertNull($result);
    }

    /**
     * @test getNonEmptyNullableString
     */
    public function nonEmptyNullableStringWorks(): void
    {
        // Do not use a default value in this situation.
        $result = $this->getDataExtractionContainer()->getLooseArrayNonEmptyDataExtractionService()
            ->getNonEmptyNullableString(self::JSONAPI_DATA, 'data/attributes/nullValue');

        self::assertNull($result);
    }
}
