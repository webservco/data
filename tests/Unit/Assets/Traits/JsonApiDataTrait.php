<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

/**
 * Phan: PhanCompatibleTraitConstant Trait [...] declares constant EMPTY_DATA which is only allowed in 8.2+
 * However, we are on ^8.4
 *
 * @suppress PhanCompatibleTraitConstant
 */
trait JsonApiDataTrait
{
    /**
     * PHPCompatibility: false positive:
     * "Function name, class name, namespace name or constant name
     * can not be reserved keyword 'array' (since version all)"
     * However syntax is correct: https://php.watch/versions/8.3/typed-constants
     *
     * @phpcs:disable PHPCompatibility.Keywords.ForbiddenNames.arrayFound
     * @phpcs:disable SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys.IncorrectKeyOrder
     */
    private const array JSONAPI_DATA = [
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
    /** @phpcs:enable */
}
