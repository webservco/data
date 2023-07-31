<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface DataExtractionContainerInterface
{
    public function getArrayDataExtractionService(): ArrayDataExtractionServiceInterface;

    public function getArrayNonEmptyDataExtractionService(): ArrayNonEmptyDataExtractionServiceInterface;
}
