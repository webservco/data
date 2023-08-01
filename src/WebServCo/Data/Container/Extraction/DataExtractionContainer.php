<?php

declare(strict_types=1);

namespace WebServCo\Data\Container\Extraction;

use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayNonEmptyDataExtractionServiceInterface;

final class DataExtractionContainer implements DataExtractionContainerInterface
{
    public function __construct(
        private LooseArrayDataExtractionServiceInterface $looseArrayDataExtractionService,
        private LooseArrayNonEmptyDataExtractionServiceInterface $looseArrayNonEmptyDataExtractionService,
        private StrictArrayDataExtractionServiceInterface $strictArrayDataExtractionService,
        private StrictArrayNonEmptyDataExtractionServiceInterface $strictArrayNonEmptyDataExtractionService,
    ) {
    }

    public function getLooseArrayDataExtractionService(): LooseArrayDataExtractionServiceInterface
    {
        return $this->looseArrayDataExtractionService;
    }

    public function getLooseArrayNonEmptyDataExtractionService(): LooseArrayNonEmptyDataExtractionServiceInterface
    {
        return $this->looseArrayNonEmptyDataExtractionService;
    }

    public function getStrictArrayDataExtractionService(): StrictArrayDataExtractionServiceInterface
    {
        return $this->strictArrayDataExtractionService;
    }

    public function getStrictArrayNonEmptyDataExtractionService(): StrictArrayNonEmptyDataExtractionServiceInterface
    {
        return $this->strictArrayNonEmptyDataExtractionService;
    }
}
