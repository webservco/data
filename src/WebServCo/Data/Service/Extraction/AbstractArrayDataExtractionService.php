<?php

declare(strict_types=1);

namespace WebServCo\Data\Service\Extraction;

use OutOfBoundsException;
use UnexpectedValueException;
use WebServCo\Data\Contract\Extraction\ArrayDataExtractionServiceInterface;

use function array_key_exists;
use function is_bool;
use function is_float;
use function is_int;
use function is_string;
use function sprintf;

abstract class AbstractArrayDataExtractionService implements ArrayDataExtractionServiceInterface
{
    private bool $useTypeCasting;
    protected const MESSAGE_VALUE_EMPTY = 'Data is empty for key %s.';
    private const MESSAGE_KEY_MISSING = 'Array does not contain key: %s.';
    private const MESSAGE_VALUE_TYPE_DIFFERENT = 'Data type is different than expected for key %s.';

    public function __construct(bool $useTypeCasting)
    {
        $this->useTypeCasting = $useTypeCasting;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getBoolean(array $data, string $key, ?bool $defaultValue = null): bool
    {
        if (!array_key_exists($key, $data)) {
            if (is_bool($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        $value = $data[$key];

        if ($this->useTypeCasting) {
            $value = (bool) $value;
        }

        if (!is_bool($value)) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_TYPE_DIFFERENT, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getFloat(array $data, string $key, ?float $defaultValue = null): float
    {
        if (!array_key_exists($key, $data)) {
            if (is_float($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        $value = $data[$key];

        if ($this->useTypeCasting) {
            $value = (float) $value;
        }

        if (!is_float($value)) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_TYPE_DIFFERENT, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getInt(array $data, string $key, ?int $defaultValue = null): int
    {
        if (!array_key_exists($key, $data)) {
            if (is_int($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        $value = $data[$key];

        if ($this->useTypeCasting) {
            $value = (int) $value;
        }

        if (!is_int($value)) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_TYPE_DIFFERENT, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getString(array $data, string $key, ?string $defaultValue = null): string
    {
        if (!array_key_exists($key, $data)) {
            if (is_string($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        $value = $data[$key];

        if ($this->useTypeCasting) {
            $value = (string) $value;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException(sprintf(self::MESSAGE_VALUE_TYPE_DIFFERENT, $key));
        }

        return $value;
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableBoolean(array $data, string $key, ?bool $defaultValue = null): ?bool
    {
        if (!array_key_exists($key, $data)) {
            if (is_bool($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        if ($data[$key] === null) {
            return null;
        }

        return $this->getBoolean($data, $key, $defaultValue);
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableFloat(array $data, string $key, ?float $defaultValue = null): ?float
    {
        if (!array_key_exists($key, $data)) {
            if (is_float($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        if ($data[$key] === null) {
            return null;
        }

        return $this->getFloat($data, $key, $defaultValue);
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableInt(array $data, string $key, ?int $defaultValue = null): ?int
    {
        if (!array_key_exists($key, $data)) {
            if (is_int($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        if ($data[$key] === null) {
            return null;
        }

        return $this->getInt($data, $key, $defaultValue);
    }

    /**
     * @param array<string,scalar|null> $data
     */
    public function getNullableString(array $data, string $key, ?string $defaultValue = null): ?string
    {
        if (!array_key_exists($key, $data)) {
            if (is_string($defaultValue)) {
                return $defaultValue;
            }

            throw new OutOfBoundsException(sprintf(self::MESSAGE_KEY_MISSING, $key));
        }

        if ($data[$key] === null) {
            return null;
        }

        return $this->getString($data, $key, $defaultValue);
    }
}
