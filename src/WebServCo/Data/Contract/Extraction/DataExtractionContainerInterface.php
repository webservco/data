<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

use WebServCo\Data\Contract\Extraction\Loose\LooseArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictNonEmptyDataExtractionServiceInterface;

interface DataExtractionContainerInterface
{
    public function getArrayStorageService(): ?ArrayStorageServiceInterface;

    public function getLooseArrayDataExtractionService(): LooseArrayDataExtractionServiceInterface;

    public function getLooseArrayNonEmptyDataExtractionService(): LooseArrayNonEmptyDataExtractionServiceInterface;

    public function getStrictArrayDataExtractionService(): StrictArrayDataExtractionServiceInterface;

    public function getStrictArrayNonEmptyDataExtractionService(): StrictArrayNonEmptyDataExtractionServiceInterface;

    public function getLooseDataExtractionService(): LooseDataExtractionServiceInterface;

    public function getLooseNonEmptyDataExtractionService(): LooseNonEmptyDataExtractionServiceInterface;

    public function getStrictDataExtractionService(): StrictDataExtractionServiceInterface;

    public function getStrictNonEmptyDataExtractionService(): StrictNonEmptyDataExtractionServiceInterface;
}
