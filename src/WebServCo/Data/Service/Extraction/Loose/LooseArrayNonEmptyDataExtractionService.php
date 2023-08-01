<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Loose;

use WebServCo\Data\Contract\Extraction\Loose\LooseArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractArrayNonEmptyDataExtractionService;

final class LooseArrayNonEmptyDataExtractionService extends AbstractArrayNonEmptyDataExtractionService implements
    LooseArrayNonEmptyDataExtractionServiceInterface
{
    public function __construct()
    {
        parent::__construct(true);
    }
}
