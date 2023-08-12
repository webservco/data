<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Loose;

use WebServCo\Data\Contract\Extraction\Loose\LooseDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;

final class LooseDataExtractionService extends AbstractScalarDataExtractionService implements
    LooseDataExtractionServiceInterface
{
    public function __construct()
    {
        parent::__construct(true);
    }
}
