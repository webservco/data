<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

trait DataTrait
{
    private const EMPTY_DATA = [
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
}
