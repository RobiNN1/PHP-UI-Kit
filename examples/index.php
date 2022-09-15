<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

function get_ui(): RobiNN\UiKit\UiKit {
    return new RobiNN\UiKit\UiKit([
        'cache'     => __DIR__.'/cache',
        'debug'     => true,
        'framework' => $_GET['fw'] ?? 'bootstrap5',
    ]);
}

$current = get_ui()->config->getFramework();

RobiNN\UiKit\AddTo::css('
body {
    margin-left: 256px;
}
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    display: block;
    width: 256px;
    overflow: hidden;
    overflow-y: auto;
    padding: 24px;
    background-color: #0f172a;
    color: #fff;
}
.sidebar h3 {
    font-size: 28px;
    font-weight: 400;
    text-align: center;
    margin: 0;
    padding: 0;
    margin-bottom: 20px;
}
.sidebar-menu,
.subitems {
    margin: 0;
    padding: 0;
    list-style: none;
}
.sidebar-menu > li > a,
.subitems > li > a {
    font-size: 14px;
    color: #fff;
    display: block;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 4px;
}
.sidebar-menu > li > a:hover,
.subitems > li > a:hover {
    background-color: #0284c7;
}
.subitems {
    margin-left: 15px;
}
.mainmenu {
    background-color: #f1f5f9 !important;
    margin: 0 !important;
    padding: 0;
    border: 0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    position: fixed;
    width: calc(100% - 256px);
    z-index: 1030;
}
.menu-item {
    padding: 18px 15px !important;
}
.menu-item > a {
    padding: 0!important;
}
.fomanticui2 .mainmenu .header.item:before {
    content: none;
}
.fomanticui2 .menu-item:before {
    content: none !important;
}
.content {
    position: relative;
    padding: calc(50px + 28px) 28px 28px;
}
');

ob_start();

require_once __DIR__.'/form.php';
require_once __DIR__.'/components.php';

$content = (string) ob_get_clean();

$form = array_diff((array) scandir(__DIR__.'/../src/Components/Form'), ['.', '..', 'Form.php']);
$components = array_diff((array) scandir(__DIR__.'/../src/Components/'), ['.', '..', 'Component.php', 'Form', 'Layout']);

$sidebaritems = [
    'form'       => $form,
    'components' => $components,
];

$frameworks = [
    'title' => ucfirst($current),
];

foreach (array_keys(get_ui()->config->getAllFrameworks()) as $framework) {
    $frameworks[] = [
        'title'  => ucfirst($framework),
        'link'   => '?fw='.$framework,
        'active' => $current === $framework,
    ];
}

$github_icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="16" height="16" class="bi">
    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
</svg>';

$page = get_ui()->addPath(__DIR__.'/')->render('page', [
    'sidebaritems' => $sidebaritems,
    'menuitems'    => [
        $frameworks,
        'right' => [
            ['title' => 'Docs', 'link' => 'https://uikit.kelcak.com/', 'new_window' => true],
            ['title' => $github_icon, 'link' => 'https://github.com/RobiNN1/PHP-UI-Kit', 'new_window' => true],
        ],
    ],
    'content'      => $content,
]);

echo layout($page, [
    'title'      => 'PHP UI Kit Examples',
    'attributes' => ['class' => get_ui()->config->getFramework()],
]);
