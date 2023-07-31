<?php

declare(strict_types=1);

namespace WebServCo\Data\Container\Extraction;

use WebServCo\Data\Contract\Extraction\ArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\ArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;

final class DataExtractionContainer implements DataExtractionContainerInterface
{
    public function __construct(
        private ArrayDataExtractionServiceInterface $arrayDataExtractionService,
        private ArrayNonEmptyDataExtractionServiceInterface $arrayNonEmptyDataExtractionService,
    ) {
    }

    public function getArrayDataExtractionService(): ArrayDataExtractionServiceInterface
    {
        return $this->arrayDataExtractionService;
    }

    public function getArrayNonEmptyDataExtractionService(): ArrayNonEmptyDataExtractionServiceInterface
    {
        return $this->arrayNonEmptyDataExtractionService;
    }
}
