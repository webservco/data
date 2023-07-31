<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ArrayDataExtractionServiceInterface;
use WebServCo\Data\Contract\Extraction\ArrayNonEmptyDataExtractionServiceInterface;

use function sprintf;

final class ArrayNonEmptyDataExtractionService implements ArrayNonEmptyDataExtractionServiceInterface
{
    private ArrayDataExtractionServiceInterface $arrayDataExtractionService;
    private const MESSAGE_VALUE_EMPTY_ERROR = 'Data is empty for key %s.';

    public function __construct(ArrayDataExtractionServiceInterface $arrayDataExtractionService)
    {
        $this->arrayDataExtractionService = $arrayDataExtractionService;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyFloat(array $data, string $key, ?float $defaultValue = null): float
    {
        $value = $this->arrayDataExtractionService->getFloat($data, $key, $defaultValue);

        if ($value === 0.0) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_EMPTY_ERROR, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyInt(array $data, string $key, ?int $defaultValue = null): int
    {
        $value = $this->arrayDataExtractionService->getInt($data, $key, $defaultValue);

        if ($value === 0) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_EMPTY_ERROR, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyString(array $data, string $key, ?string $defaultValue = null): string
    {
        $value = $this->arrayDataExtractionService->getString($data, $key, $defaultValue);

        if ($value === '') {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_EMPTY_ERROR, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float
    {
        $value = $this->arrayDataExtractionService->getNullableFloat($data, $key, $defaultValue);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyFloat($data, $key, $defaultValue);
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyNullableInt(array $data, string $key, ?int $defaultValue = null): ?int
    {
        $value = $this->arrayDataExtractionService->getNullableInt($data, $key, $defaultValue);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyInt($data, $key, $defaultValue);
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNonEmptyNullableString(array $data, string $key, ?string $defaultValue = null): ?string
    {
        $value = $this->arrayDataExtractionService->getNullableString($data, $key, $defaultValue);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyString($data, $key, $defaultValue);
    }
}
