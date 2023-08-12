<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction\Strict;

use WebServCo\Data\Contract\Extraction\Strict\StrictDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\AbstractScalarDataExtractionService;

final class StrictDataExtractionService extends AbstractScalarDataExtractionService implements
    StrictDataExtractionServiceInterface
{
    public function __construct()
    {
        parent::__construct(false);
    }
}
