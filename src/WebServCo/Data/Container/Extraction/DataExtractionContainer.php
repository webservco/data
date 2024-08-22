<?php

declare(strict_types=1);

namespace WebServCo\Data\Container\Extraction;

use WebServCo\Data\Contract\Extraction\ArrayStorageServiceInterface;
use WebServCo\Data\Contract\Extraction\DataExtractionContainerInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Loose\LooseNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictArrayNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\Strict\StrictNonEmptyDataExtractionServiceInterface;
use WebServCo\Data\Service\Extraction\ArrayStorageService;
use WebServCo\Data\Service\Extraction\Loose\LooseArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseDataExtractionService;
use WebServCo\Data\Service\Extraction\Loose\LooseNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictArrayNonEmptyDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictDataExtractionService;
use WebServCo\Data\Service\Extraction\Strict\StrictNonEmptyDataExtractionService;

/**
 * Container
 *
 * PHPMD error CouplingBetweenObjects could be solved by using only implementations and not also interfaces.
 *
 * @todo solve CouplingBetweenObjects
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
final class DataExtractionContainer implements DataExtractionContainerInterface
{
    private bool $useArrayStorageService;
    private ?ArrayStorageServiceInterface $arrayStorageService = null;
    private ?LooseArrayDataExtractionServiceInterface $looseArrayDataExtractionService = null;
    private ?LooseArrayNonEmptyDataExtractionServiceInterface $looseArrayNonEmptyDataExtractionService = null;
    private ?StrictArrayDataExtractionServiceInterface $strictArrayDataExtractionService = null;
    private ?StrictArrayNonEmptyDataExtractionServiceInterface $strictArrayNonEmptyDataExtractionService = null;
    private ?LooseDataExtractionServiceInterface $looseDataExtractionService = null;
    private ?LooseNonEmptyDataExtractionServiceInterface $looseNonEmptyDataExtractionService = null;
    private ?StrictDataExtractionServiceInterface $strictDataExtractionService = null;
    private ?StrictNonEmptyDataExtractionServiceInterface $strictNonEmptyDataExtractionService = null;

    public function __construct(bool $useArrayStorageService)
    {
        $this->useArrayStorageService = $useArrayStorageService;
    }

    public function getArrayStorageService(): ?ArrayStorageServiceInterface
    {
        if ($this->useArrayStorageService === false) {
            return null;
        }

        if ($this->arrayStorageService === null) {
            $this->arrayStorageService = new ArrayStorageService();
        }

        return $this->arrayStorageService;
    }

    public function getLooseArrayDataExtractionService(): LooseArrayDataExtractionServiceInterface
    {
        if ($this->looseArrayDataExtractionService === null) {
            $this->looseArrayDataExtractionService = new LooseArrayDataExtractionService(
                $this->getArrayStorageService(),
                $this->getLooseDataExtractionService(),
                $this->getLooseNonEmptyDataExtractionService(),
            );
        }

        return $this->looseArrayDataExtractionService;
    }

    public function getLooseArrayNonEmptyDataExtractionService(): LooseArrayNonEmptyDataExtractionServiceInterface
    {
        if ($this->looseArrayNonEmptyDataExtractionService === null) {
            $this->looseArrayNonEmptyDataExtractionService = new LooseArrayNonEmptyDataExtractionService(
                $this->getArrayStorageService(),
                $this->getLooseDataExtractionService(),
                $this->getLooseNonEmptyDataExtractionService(),
            );
        }

        return $this->looseArrayNonEmptyDataExtractionService;
    }

    public function getStrictArrayDataExtractionService(): StrictArrayDataExtractionServiceInterface
    {
        if ($this->strictArrayDataExtractionService === null) {
            $this->strictArrayDataExtractionService = new StrictArrayDataExtractionService(
                $this->getArrayStorageService(),
                $this->getStrictDataExtractionService(),
                $this->getStrictNonEmptyDataExtractionService(),
            );
        }

        return $this->strictArrayDataExtractionService;
    }

    public function getStrictArrayNonEmptyDataExtractionService(): StrictArrayNonEmptyDataExtractionServiceInterface
    {
        if ($this->strictArrayNonEmptyDataExtractionService === null) {
            $this->strictArrayNonEmptyDataExtractionService = new StrictArrayNonEmptyDataExtractionService(
                $this->getArrayStorageService(),
                $this->getStrictDataExtractionService(),
                $this->getStrictNonEmptyDataExtractionService(),
            );
        }

        return $this->strictArrayNonEmptyDataExtractionService;
    }

    public function getLooseDataExtractionService(): LooseDataExtractionServiceInterface
    {
        if ($this->looseDataExtractionService === null) {
            $this->looseDataExtractionService = new LooseDataExtractionService();
        }

        return $this->looseDataExtractionService;
    }

    public function getLooseNonEmptyDataExtractionService(): LooseNonEmptyDataExtractionServiceInterface
    {
        if ($this->looseNonEmptyDataExtractionService === null) {
            $this->looseNonEmptyDataExtractionService = new LooseNonEmptyDataExtractionService();
        }

        return $this->looseNonEmptyDataExtractionService;
    }

    public function getStrictDataExtractionService(): StrictDataExtractionServiceInterface
    {
        if ($this->strictDataExtractionService === null) {
            $this->strictDataExtractionService = new StrictDataExtractionService();
        }

        return $this->strictDataExtractionService;
    }

    public function getStrictNonEmptyDataExtractionService(): StrictNonEmptyDataExtractionServiceInterface
    {
        if ($this->strictNonEmptyDataExtractionService === null) {
            $this->strictNonEmptyDataExtractionService = new StrictNonEmptyDataExtractionService();
        }

        return $this->strictNonEmptyDataExtractionService;
    }
}
