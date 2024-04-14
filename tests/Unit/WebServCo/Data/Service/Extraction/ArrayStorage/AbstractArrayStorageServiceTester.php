<?php

declare(strict_types=1);

namespace Tests\Unit\WebServCo\Data\Service\Extraction\ArrayStorage;

use PHPUnit\Framework\TestCase;
use WebServCo\Data\Contract\Extraction\ArrayStorageServiceInterface;
use WebServCo\Data\Service\Extraction\ArrayStorageService;

abstract class AbstractArrayStorageServiceTester extends TestCase
{
    protected const ABC_KEY = 'a/b/c';
    protected const ABC_KEYS = ['a', 'b', 'c'];

    protected const ARRAY_A = ['a'];

    protected const ARRAY_EMPTY = [];

    protected const ARRAY_ONE_SUB = [
        '1.1' => [],
    ];

    protected const ARRAY_ONE = [
        'one' => self::ARRAY_ONE_SUB,
    ];

    protected const KEY_ONE = 'one';

    protected const KEY_TWO = 'two';

    protected const KEYS_ONE = ['one'];

    private ?ArrayStorageServiceInterface $arrayStorageService = null;

    protected function getService(): ArrayStorageServiceInterface
    {
        if ($this->arrayStorageService === null) {
            $this->arrayStorageService = new ArrayStorageService();
        }

        return $this->arrayStorageService;
    }
}
