<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

function get_ui(): RobiNN\UiKit\UiKit {
    return RobiNN\UiKit\UiKit::getInstance([
        'cache'     => __DIR__.'/cache',
        'framework' => $_GET['fw'] ?? 'bootstrap5',
        //'debug'     => true,
    ]);
}

// example of loading local assets (you have to download these files)
/*$local_assets = [
    'bootstrap3'  => [
        'css' => ['./assets/bootstrap3/css/bootstrap.min.css'],
        'js'  => ['./assets/jquery.min.js', './assets/bootstrap3/js/bootstrap.min.js'],
    ],
    'bootstrap4'  => [
        'css' => ['./assets/bootstrap4/css/bootstrap.min.css'],
        'js'  => ['./assets/jquery.min.js', './assets/bootstrap4/js/bootstrap.bundle.min.js'],
    ],
    'bootstrap5'  => [
        'css' => ['./assets/bootstrap5/css/bootstrap.min.css'],
        'js'  => ['./assets/bootstrap5/js/bootstrap.bundle.min.js'],
    ],
    'fomanticui2' => [
        'css' => ['./assets/fomanticui2/semantic.min.css'],
        'js'  => ['./assets/jquery.min.js', './assets/fomanticui2/semantic.min.js'],
    ],
];

get_ui()
    ->setFrameworkOption('files', $local_assets[get_ui()->config->getFramework()])
    ->setFrameworkOption('carousel.files', [
        'css' => ['./assets/fomanticui2/swiper/swiper-bundle.min.css'],
        'js'  => ['./assets/fomanticui2/swiper/swiper-bundle.min.js'],
    ], 'fomanticui2');*/

/**
 * @return array<int|string, mixed>
 */
function get_frameworks(): array {
    $current = get_ui()->config->getFramework();
    $frameworks = ['title' => ucfirst($current),];

    foreach (array_keys(get_ui()->config->getAllFrameworks()) as $framework) {
        $frameworks[] = [
            'title'  => ucfirst($framework),
            'link'   => '?fw='.$framework,
            'active' => $current === $framework,
        ];
    }

    return $frameworks;
}

ob_start();

require_once __DIR__.'/form.php';
require_once __DIR__.'/components.php';

$content = (string) ob_get_clean();

get_ui()->addPath(__DIR__.'/', 'examples');

$page = get_ui()->render('@examples/page', [
    'sidebaritems' => [
        'form'       => [
            'Input',
            'Select',
            'Textarea',
            'Checkbox',
        ],
        'components' => [
            'Accordion',
            'Alert',
            'Badge',
            'Breadcrumbs',
            'Button',
            'ButtonGroup',
            'Card',
            'Carousel',
            'Dropdown',
            'ListGroup',
            'Menu',
            'Modal',
            'Pagination',
            'Progress',
            'Tabs',
        ],
    ],
    'frameworks'   => get_frameworks(),
    'content'      => $content,
]);

echo layout($page, [
    'title'      => 'PHP UI Kit Examples',
    'attributes' => ['class' => get_ui()->config->getFramework()],
]);
