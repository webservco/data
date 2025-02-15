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
    private const string MESSAGE_VALUE_TYPE_DIFFERENT = 'Data type is different than expected.';

    public function __construct(private bool $useTypeCasting)
    {
    }

    public function getBoolean(mixed $value): bool
    {
        if ($this->useTypeCasting) {
            $value = (bool) $value;
        }

        if (!is_bool($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    public function getFloat(mixed $value): float
    {
        if ($this->useTypeCasting) {
            $value = $this->getTypeCastedFloatValue($value);
        }

        if (!is_float($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    public function getInt(mixed $value): int
    {
        if ($this->useTypeCasting) {
            $value = $this->getTypeCastedIntValue($value);
        }

        if (!is_int($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    public function getString(mixed $value): string
    {
        if ($this->useTypeCasting) {
            $value = $this->getTypeCastedStringValue($value);
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_TYPE_DIFFERENT);
        }

        return $value;
    }

    public function getNullableBoolean(mixed $value): ?bool
    {
        // Since value should not be a string, we will consider empty string as null.
        if ($value === null || $value === '') {
            return null;
        }

        return $this->getBoolean($value);
    }

    public function getNullableFloat(mixed $value): ?float
    {
        // Since value should not be a string, we will consider empty string as null.
        if ($value === null || $value === '') {
            return null;
        }

        return $this->getFloat($value);
    }

    public function getNullableInt(mixed $value): ?int
    {
        // Since value should not be a string, we will consider empty string as null.
        if ($value === null || $value === '') {
            return null;
        }

        return $this->getInt($value);
    }

    public function getNullableString(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return $this->getString($value);
    }

    private function getTypeCastedFloatValue(mixed $value): float
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('Value is not scalar, type casting is not possible.');
        }

        return (float) $value;
    }

    private function getTypeCastedIntValue(mixed $value): int
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('Value is not scalar, type casting is not possible.');
        }

        return (int) $value;
    }

    private function getTypeCastedStringValue(mixed $value): string
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('Value is not scalar, type casting is not possible.');
        }

        return (string) $value;
    }
}
