<?php

declare(strict_types=1);

namespace WebServCo\Data\DataTransferObject\KeyValue;

use WebServCo\Data\Contract\Transfer\DataTransferInterface;

final class StringFloat implements DataTransferInterface
{
    /**
     * @readonly
     */
    public string $key;
    /**
     * @readonly
     */
    public float $value;
    public function __construct(string $key, float $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
