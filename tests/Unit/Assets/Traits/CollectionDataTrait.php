<?php

declare(strict_types=1);

namespace Tests\Unit\Assets\Traits;

trait CollectionDataTrait
{
    private const array COLLECTION_DATA = [
        'user' => [
            'emptyArray' => [],
            'groupIds' => [3, 7],
            'groupIdsAsText' => ['3', '7'],
            'groups' => [['id' => 3], ['id' => 7]],
            'limits' => ['pages' => 10],
            'mixedValues' => [1, 2.5, true],
            'name' => 'Ana',
            'nothing' => null,
            // PHP makes these keys the ints 1 and 2, as `json_decode()` does with `{"1": "one", "2": "two"}`.
            'numberedNames' => ['1' => 'one', '2' => 'two'],
            'roles' => ['admin', 'editor'],
            'settings' => ['language' => 'ro', 'theme' => 'dark'],
        ],
    ];
}
