<?php

declare(strict_types=1);

namespace WebServCo\Data\Contract\Extraction;

interface DataExtractionContainerFactoryInterface
{
    public function createDataExtractionContainer(bool $useArrayStorageService): DataExtractionContainerInterface;
}
