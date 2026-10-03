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
