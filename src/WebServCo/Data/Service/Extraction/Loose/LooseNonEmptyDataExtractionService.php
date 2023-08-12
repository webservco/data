<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Loose;

use WebServCo\Data\Contract\Extraction\Loose\LooseNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractScalarNonEmptyDataExtractionService;

final class LooseNonEmptyDataExtractionService extends AbstractScalarNonEmptyDataExtractionService implements
    LooseNonEmptyDataExtractionServiceInterface
{
    public function __construct()
    {
        parent::__construct(true);
    }
}
