<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ScalarNonEmptyDataExtractionServiceInterface;

abstract class AbstractScalarNonEmptyDataExtractionService extends AbstractScalarDataExtractionService implements
    ScalarNonEmptyDataExtractionServiceInterface
{
    private const MESSAGE_VALUE_EMPTY = 'Data is empty.';

    /**
     * @param mixed $value
     */
    public function getNonEmptyFloat($value): float
    {
        $value = $this->getFloat($value);

        if ($value === 0.0) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_EMPTY);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getNonEmptyInt($value): int
    {
        $value = $this->getInt($value);

        if ($value === 0) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_EMPTY);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getNonEmptyString($value): string
    {
        $value = $this->getString($value);

        if ($value === '') {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_EMPTY);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getNonEmptyNullableFloat($value): ?float
    {
        $value = $this->getNullableFloat($value);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyFloat($value);
    }

    /**
     * @param mixed $value
     */
    public function getNonEmptyNullableInt($value): ?int
    {
        $value = $this->getNullableInt($value);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyInt($value);
    }

    /**
     * @param mixed $value
     */
    public function getNonEmptyNullableString($value): ?string
    {
        $value = $this->getNullableString($value);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyString($value);
    }
}
