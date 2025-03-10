<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\Arrays\WithArrayStorage;

use PHPUnit\Framework\TestCase;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;
use WebServCo\Data\Factory\Extraction\DataExtractionContainerFactory;

/**
 * PhanRedefinedExtendedClass
 * "[..] extends abstract Class [..] declared at [..] which is also declared at [..]"
 *
 * @suppress PhanRedefinedExtendedClass
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 */
abstract class AbstractWithTester extends TestCase
{
    private const bool USE_ARRAY_STORAGE_SERVICE = true;

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
