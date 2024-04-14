<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage\Loose\JsonApi;

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
        $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getBoolean(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
        );
    }

    /**
     * @test getBoolean
     */
    public function dataBooleanValueMatches(): void
    {
        $result = $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getBoolean(
            self::JSONAPI_DATA,
            'data/attributes/loose/booleanValue',
        );

        self::assertTrue($result);
    }

    /**
     * @test getBoolean
     */
    public function dataBooleanWorksWhenNullWithDefaultValue(): void
    {
        // Set default value as expected.
        $result = $this->getDataExtractionContainer()->getLooseArrayDataExtractionService()->getBoolean(
            self::JSONAPI_DATA,
            'data/attributes/nullValue',
            false,
        );

        self::assertFalse($result);
    }
}
