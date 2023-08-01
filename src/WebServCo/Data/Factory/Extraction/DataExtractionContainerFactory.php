<?php

declare(strict_types=1);

namespace WebServCo\Data\Factory\Extraction;

use WebServCo\Data\Container\Extraction\DataExtractionContainer;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerFactoryInterface;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;
use WebServCo\Data\Service\Extraction\Loose\LooseArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayNonEmptyDataExtractionService;

final class DataExtractionContainerFactory implements DataExtractionContainerFactoryInterface
{
    public function createDataExtractionContainer(): DataExtractionContainerInterface
    {
        return new DataExtractionContainer(
            new LooseArrayDataExtractionService(),
            new LooseArrayNonEmptyDataExtractionService(),
            new StrictArrayDataExtractionService(),
            new StrictArrayNonEmptyDataExtractionService(),
        );
    }
}
