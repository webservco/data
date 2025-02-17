<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

/**
 * Phan: PhanCompatibleTraitConstant Trait [...] declares constant EMPTY_DATA which is only allowed in 8.2+
 * However, we are on ^8.4
 *
 * @suppress PhanCompatibleTraitConstant
 */
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
