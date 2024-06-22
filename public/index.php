<?php

declare(strict_types=1);

use WebServCo\Data\Container\Extraction\DataExtractionContainer;

require __DIR__ . '/../vendor/autoload.php';

$page_title = 'webservco/data demo';

$array = [
    'a0.1' => [
        'a1.1' => [
            'a2.1' => [
                'a3.1' => [
                    'a4.1' => [
                        'a5.1' => [
                            'a6.1' => [
                                'a7.1' => [
                                    'float' => [
                                        'empty' => 0.00,
                                        'nonEmpty' => 1.23,
                                    ],
                                    'int' => [
                                        'empty' => 0,
                                        'nonEmpty' => 7,
                                    ],
                                    'null' => null,
                                    'string' => [
                                        'empty' => '',
                                        'nonEmpty' => 'foo',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'a1.2' => [],
        'a1.3' => [],
    ],
];

$dataExtractionContainer = new DataExtractionContainer(true);

$resultsStrictNonEmpty = [];
$exception = null;

try {
    $resultsStrictNonEmpty['float'] = $dataExtractionContainer->getStrictArrayNonEmptyDataExtractionService()
    ->getNonEmptyFloat($array, 'a0.1/a1.1/a2.1/a3.1/a4.1/a5.1/a6.1/a7.1/float/nonEmpty');
} catch (Throwable $throwable) {
    $exception = $throwable;
}
?>
<html>
    <head>
        <title><?=$page_title?></title>
    </head>
    <body>
        <h2><?=$page_title?></h2>
        <div>
            <h3>Input</h3>
            <pre>
                <?php
                var_export($array);
                ?>
            </pre>
        </div>
        <hr>
        <div>
            <h3>strict / non-empty</h3>
            <pre>
                <?php
                var_export($resultsStrictNonEmpty);
                ?>
            </pre>
        </div>
        <?php if ($exception instanceof Throwable) : ?>
            <p><?=$exception->getMessage();?></p>
        <?php endif; ?>
        <hr>
        Edit: https://phpsandbox.io/n/wsc-data-test-mg0aw
        <br>
        View: https://mg0aw.ciroue.com
    </body>
</html>
