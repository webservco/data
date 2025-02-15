<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

trait DataTrait
{
    /**
     * PHPCompatibility: false positive:
     * "Function name, class name, namespace name or constant name
     * can not be reserved keyword 'array' (since version all)"
     * However syntax is correct: https://php.watch/versions/8.3/typed-constants
     *
     * @phpcs:disable PHPCompatibility.Keywords.ForbiddenNames.arrayFound
     */
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
