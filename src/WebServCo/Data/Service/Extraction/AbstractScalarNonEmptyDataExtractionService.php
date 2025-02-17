<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use Override;
use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ScalarNonEmptyDataExtractionServiceInterface;

abstract class AbstractScalarNonEmptyDataExtractionService extends AbstractScalarDataExtractionService implements
    ScalarNonEmptyDataExtractionServiceInterface
{
    private const string MESSAGE_VALUE_EMPTY = 'Data is empty.';

    #[Override]
    public function getNonEmptyFloat(mixed $value): float
    {
        $value = $this->getFloat($value);

        if ($value === 0.0) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_EMPTY);
        }

        return $value;
    }

    #[Override]
    public function getNonEmptyInt(mixed $value): int
    {
        $value = $this->getInt($value);

        if ($value === 0) {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_EMPTY);
        }

        return $value;
    }

    #[Override]
    public function getNonEmptyString(mixed $value): string
    {
        $value = $this->getString($value);

        if ($value === '') {
            throw new UnexpectedValueException(self::MESSAGE_VALUE_EMPTY);
        }

        return $value;
    }

    #[Override]
    public function getNonEmptyNullableFloat(mixed $value): ?float
    {
        $value = $this->getNullableFloat($value);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyFloat($value);
    }

    #[Override]
    public function getNonEmptyNullableInt(mixed $value): ?int
    {
        $value = $this->getNullableInt($value);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyInt($value);
    }

    #[Override]
    public function getNonEmptyNullableString(mixed $value): ?string
    {
        $value = $this->getNullableString($value);

        if ($value === null) {
            return null;
        }

        return $this->getNonEmptyString($value);
    }
}
