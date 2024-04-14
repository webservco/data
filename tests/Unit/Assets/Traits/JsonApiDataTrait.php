<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

trait JsonApiDataTrait
{
    // @phpcs:ignore SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys.IncorrectKeyOrder
    private const JSONAPI_DATA = [
        'jsonapi' => [
            'version' => '1.1',
        ],
        // @phpcs:ignore SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys.IncorrectKeyOrder
        'data' => [
            'type' => 'unitTest',
            'attributes' => [
                'loose' => [
                    'booleanValue' => 1,
                    'floatValue' => '1.23',
                    'integerValue' => '138',
                    'stringValue' => 99,
                ],
                'nullValue' => null,
                'strict' => [
                    'booleanValue' => true,
                    'floatValue' => 1.23,
                    'integerValue' => 138,
                    'stringValue' => '99',
                ],
            ],
            'meta' => [],
        ],
        'errors' => null,
        'meta' => [
            'version' => 'v1',
        ],
    ];
}
