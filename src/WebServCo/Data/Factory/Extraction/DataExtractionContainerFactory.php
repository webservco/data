<?php

declare(strict_types=1);

namespace WebServCo\Data\Factory\Extraction;

use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerFactoryInterface;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;

final class DataExtractionContainerFactory implements DataExtractionContainerFactoryInterface
{
    public function createDataExtractionContainer(): DataExtractionContainerInterface
    {
        return new DataExtractionContainer();
    }
}
