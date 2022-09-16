<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

function get_ui(): RobiNN\UiKit\UiKit {
    return new RobiNN\UiKit\UiKit([
        'cache'     => __DIR__.'/cache',
        'framework' => $_GET['fw'] ?? 'bootstrap5',
    ]);
}

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

$page = get_ui()->addPath(__DIR__.'/')->render('page', [
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
