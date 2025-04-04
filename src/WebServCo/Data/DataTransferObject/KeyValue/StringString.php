<?php

declare(strict_types=1);

namespace WebServCo\Data\DataTransferObject\KeyValue;

use WebServCo\Data\Contract\Transfer\DataTransferInterface;

final class StringString implements DataTransferInterface
{
    /**
     * @readonly
     */
    public string $key;
    /**
     * @readonly
     */
    public string $value;
    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
