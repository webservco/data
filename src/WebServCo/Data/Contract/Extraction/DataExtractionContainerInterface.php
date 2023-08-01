<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

use WebServCo\Data\Contract\Extraction\Loose\LooseArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayNonEmptyDataExtractionServiceInterface;

interface DataExtractionContainerInterface
{
    public function getLooseArrayDataExtractionService(): LooseArrayDataExtractionServiceInterface;

    public function getLooseArrayNonEmptyDataExtractionService(): LooseArrayNonEmptyDataExtractionServiceInterface;

    public function getStrictArrayDataExtractionService(): StrictArrayDataExtractionServiceInterface;

    public function getStrictArrayNonEmptyDataExtractionService(): StrictArrayNonEmptyDataExtractionServiceInterface;
}
