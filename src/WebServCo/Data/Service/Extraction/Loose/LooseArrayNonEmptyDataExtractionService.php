<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Loose;

use WebServCo\Data\Contract\Extraction\ArrayStorageServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractArrayNonEmptyDataExtractionService;

final class LooseArrayNonEmptyDataExtractionService extends AbstractArrayNonEmptyDataExtractionService implements
    LooseArrayNonEmptyDataExtractionServiceInterface
{
    public function __construct(?ArrayStorageServiceInterface $arrayStorageService, LooseDataExtractionServiceInterface $scalarDataExtractionService, LooseNonEmptyDataExtractionServiceInterface $scalarNonEmptyDataExtractionService)
    {
        parent::__construct($arrayStorageService, $scalarDataExtractionService, $scalarNonEmptyDataExtractionService);
    }
}
