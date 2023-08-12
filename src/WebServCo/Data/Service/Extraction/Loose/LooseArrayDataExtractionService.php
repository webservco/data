<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Loose;

use WebServCo\Data\Contract\Extraction\Loose\LooseArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractArrayDataExtractionService;

final class LooseArrayDataExtractionService extends AbstractArrayDataExtractionService implements
    LooseArrayDataExtractionServiceInterface
{
    public function __construct(
        LooseDataExtractionServiceInterface $scalarDataExtractionService,
        LooseNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService,
    ) {
        parent::__construct($scalarDataExtractionService, $scalarNonEmptyDataExtractionService);
    }
}
