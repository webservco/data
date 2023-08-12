<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Strict;

use WebServCo\Data\Contract\Extraction\Strict\StrictArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractArrayNonEmptyDataExtractionService;

final class StrictArrayNonEmptyDataExtractionService extends AbstractArrayNonEmptyDataExtractionService implements
    StrictArrayNonEmptyDataExtractionServiceInterface
{
    public function __construct(StrictDataExtractionServiceInterface $scalarDataExtractionService, StrictNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService)
    {
        parent::__construct($scalarDataExtractionService, $scalarNonEmptyDataExtractionService);
    }
}
