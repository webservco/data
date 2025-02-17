<?php

declare(strict_types=1);

namespace WebServCo\Data\DataTransferObject\KeyValue;

use WebServCo\Data\Contract\Transfer\DataTransferInterface;

final readonly class StringFloat implements DataTransferInterface
{
    public function __construct(public readonly string $key, public readonly float $value)
    {
    }
}
