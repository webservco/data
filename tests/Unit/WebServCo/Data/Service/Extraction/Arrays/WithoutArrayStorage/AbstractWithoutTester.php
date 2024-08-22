<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithoutArrayStorage;

use PHPUnit\Framework\TestCase;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;

abstract class AbstractWithoutTester extends TestCase
{
    private const bool USE_ARRAY_STORAGE_SERVICE = false;

    private ?DataExtractionContainerInterface $dataExtractionContainer = null;

    protected function getDataExtractionContainer(): DataExtractionContainerInterface
    {
        if ($this->dataExtractionContainer === null) {
            $dataExtractionContainerFactory = new DataExtractionContainerFactory();
            $this->dataExtractionContainer = $dataExtractionContainerFactory->createDataExtractionContainer(
                self::USE_ARRAY_STORAGE_SERVICE,
            );
        }

        return $this->dataExtractionContainer;
    }
}
