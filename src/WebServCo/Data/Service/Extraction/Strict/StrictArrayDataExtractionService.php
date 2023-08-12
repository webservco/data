<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Strict;

use WebServCo\Data\Contract\Extraction\Strict\StrictArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;

final class StrictArrayDataExtractionService extends AbstractArrayDataExtractionService implements
    StrictArrayDataExtractionServiceInterface
{
    public function __construct(
        StrictDataExtractionServiceInterface $scalarDataExtractionService,
        StrictNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService,
    ) {
        parent::__construct($scalarDataExtractionService, $scalarNonEmptyDataExtractionService);
    }
}
