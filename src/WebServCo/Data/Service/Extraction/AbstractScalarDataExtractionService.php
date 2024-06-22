<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ScalarDataExtractionServiceInterface;

use function is_bool;
use function is_float;
use function is_int;
use function is_scalar;
use function is_string;

abstract class AbstractScalarDataExtractionService implements ScalarDataExtractionServiceInterface
{
    private bool $useTypeCasting;
    private const MESSAGE_VALUE_TYPE_DIFFERENT = 'Data type is different than expected.';

    public function __construct(bool $useTypeCasting)
    {
        $this->useTypeCasting = $useTypeCasting;
    }

    /**
     * @param mixed $value
     */
    public function getBoolean($value): bool
    {
        if ($this->useTypeCasting) {
            $value = (bool) $value;
        }

        if (!is_bool($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getFloat($value): float
    {
        if ($this->useTypeCasting) {
            $value = $this->getTypeCastedFloatValue($value);
        }

        if (!is_float($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getInt($value): int
    {
        if ($this->useTypeCasting) {
            $value = $this->getTypeCastedIntValue($value);
        }

        if (!is_int($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getString($value): string
    {
        if ($this->useTypeCasting) {
            $value = $this->getTypeCastedStringValue($value);
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    public function getNullableBoolean($value): ?bool
    {
        // Since value should not be a string, we will consider empty string as null.
        if ($value === null || $value === '') {
            return null;
        }

        return $this->getBoolean($value);
    }

    /**
     * @param mixed $value
     */
    public function getNullableFloat($value): ?float
    {
        // Since value should not be a string, we will consider empty string as null.
        if ($value === null || $value === '') {
            return null;
        }

        return $this->getFloat($value);
    }

    /**
     * @param mixed $value
     */
    public function getNullableInt($value): ?int
    {
        // Since value should not be a string, we will consider empty string as null.
        if ($value === null || $value === '') {
            return null;
        }

        return $this->getInt($value);
    }

    /**
     * @param mixed $value
     */
    public function getNullableString($value): ?string
    {
        if ($value === null) {
            return null;
        }

        return $this->getString($value);
    }

    /**
     * @param mixed $value
     */
    private function getTypeCastedFloatValue($value): float
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('Value is not scalar, type casting is not possible.');
        }

        return (float) $value;
    }

    /**
     * @param mixed $value
     */
    private function getTypeCastedIntValue($value): int
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('Value is not scalar, type casting is not possible.');
        }

        return (int) $value;
    }

    /**
     * @param mixed $value
     */
    private function getTypeCastedStringValue($value): string
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('Value is not scalar, type casting is not possible.');
        }

        return (string) $value;
    }
}
