<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

trait DataTrait
{
    private const array EMPTY_DATA = [
        'loose' => [
            'floatValue' => '0.00',
            'integerValue' => '0',
            'stringValue' => '',
        ],
        'strict' => [
            'floatValue' => 0.00,
            'integerValue' => 0,
            'stringValue' => '',
        ],
    ];
    /** @phpcs:enable */
}
