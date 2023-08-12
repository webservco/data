<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Strict;

use WebServCo\Data\Contract\Extraction\Strict\StrictNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractScalarNonEmptyDataExtractionService;

final class StrictNonEmptyDataExtractionService extends AbstractScalarNonEmptyDataExtractionService implements
    StrictNonEmptyDataExtractionServiceInterface
{
    public function __construct()
    {
        parent::__construct(false);
    }
}
