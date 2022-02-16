<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (version_compare(phpversion(), '7.4', '<')) {
    die('PHP UI Kit is not compatible with PHP versions older than 7.4.');
}

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/helpers.php';

ob_start();

echo opencontainer(false, ['attributes' => ['style' => 'padding-top: 3rem;padding-bottom: 3rem;']]);

echo '<div style="text-align:center;margin-bottom:3rem;">
<h1>PHP UI Kit Examples</h1>
<h3>Current CSS Framework: <b>'.get_ui()->getFramework().'</b></h3>
<p>This file shows the basic usage of all components.</p>
</div>';

echo '<h4>Accordion</h4>';
echo accordion('test', [
    'Title 1' => 'Content 1',
    'Title 2' => 'Content 2',
]);
echo '<hr>';

echo '<h4>Alert</h4>';
echo openrow();
echo opengrid([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Default');
echo closegrid();
echo opengrid([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Success', 'success');
echo closegrid();
echo opengrid([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Warning', 'warning');
echo closegrid();
echo opengrid([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Error', 'error');
echo closegrid();
echo opengrid([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Info', 'info', ['dismiss' => true]);
echo closegrid();
echo closerow();
echo '<hr>';

echo '<h4>Badge</h4>';
echo badge('Default');
echo badge('Primary', 'primary');
echo badge('Success', 'success');
echo badge('Warning', 'warning');
echo badge('Error', 'error');
echo badge('Info', 'info');
echo badge('Rounded', 'default', ['rounded' => true]);
echo '<hr>';

echo '<h4>Breadcrumbs</h4>';
echo breadcrumbs([
    'Link 1' => 'link1.php',
    'Link 2' => 'link2.php',
]);
echo '<hr>';

echo '<h4>Button</h4>';
echo button('Default');
echo button('Primary', 'button', ['color' => 'primary']);
echo button('Success', 'button', ['color' => 'success']);
echo button('Warning', 'button', ['color' => 'warning']);
echo button('Error', 'button', ['color' => 'error']);
echo button('Info', 'button', ['color' => 'info']);
echo button('Small', 'button', ['size' => 'sm']);
echo button('Default');
echo button('Large', 'button', ['size' => 'lg']);
echo button('Link', '', ['link' => 'link.php']);
echo button('Active', '', ['active' => true]);
echo button('Disabled', '', ['disabled' => true]);
echo '<hr>';

echo '<h4>Button group</h4>';
$btns = [
    0          => 'First',
    1          => 'Second',
    'test'     => ['title' => 'Link', 'link' => 'link.php', 'btn_options' => ['color' => 'primary']],
    'savedata' => ['title' => 'Submit', 'type' => 'submit', 'btn_options' => ['color' => 'success', 'name' => 'savedata']],
    'btn1'     => ['title' => 'No value', 'btn_options' => ['value' => null]],
];
echo '<div style="display:block;margin-bottom:20px;">';
echo button_group([
    'size'    => 'sm',
    'options' => $btns,
]);
echo '</div>';
echo '<div style="display:block;margin-bottom:20px;">';
echo button_group([
    'options' => $btns,
]);
echo '</div>';
echo '<div style="display:block;margin-bottom:20px;">';
echo button_group([
    'size'    => 'lg',
    'options' => $btns,
]);
echo '</div>';
echo '<hr>';

echo '<h4>Card</h4>';
echo openrow();
echo opengrid([100, 50]);
echo card([
    'header' => 'Header',
    'body'   => 'Body',
    'footer' => 'Footer',
]);
echo closegrid();
echo opengrid([100, 50]);
echo card([
    'body' => '
    <h3>Title</h3>
    <h4>Sub title</h4>
    <p>Text</p>
    ',
]);
echo closegrid();
echo closerow();
echo '<hr>';

echo '<h4>Carousel</h4>';
echo carousel('test', [
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">First slide</text>
    </svg>',
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">Second slide</text>
    </svg>',
]);
echo '<hr>';

echo '<h4>Dropdown</h4>';
echo dropdown('Dropdown', [
    ['title' => 'Item 1', 'link' => 'link1.php'],
    'divider',
    ['title' => 'Item 2'],
    ['custom' => '<b>Custom bold text</b>'],
]);
echo '<hr>';

echo '<h4>List Group</h4>';
echo list_group([
    'Item 1',
    'Item 2',
]);
echo '<hr>';

echo '<h4>Menu</h4>';
echo menu('test', [
    ['title' => 'Item 1', 'link' => 'link1.php'],
    ['custom' => button('Button')],
    ['title' => 'Item 2', 'link' => 'link2.php', 'active' => true],
    [
        'title' => 'Dropdown',
        ['title' => 'Sub Item 1', 'link' => 'sub_link1.php'],
        ['title' => 'Sub Item 2', 'link' => 'sub_link2.php'],
    ],
    'right' => [
        ['custom' => button('Button 2')],
        ['title' => 'Right 1', 'link' => 'right1.php'],
        ['title' => 'Right 2', 'link' => 'right2.php'],
        [
            'title' => 'Right Dropdown',
            ['title' => 'Sub Right Item 1', 'link' => 'sub_right_link1.php'],
            ['title' => 'Sub Right Item 2', 'link' => 'sub_right_link2.php'],
        ],
    ],
]);
echo '<hr>';

echo '<h4>Modal</h4>';
echo modal('test', [
    'title'  => 'Modal Title',
    'header' => 'Testttt',
    'body'   => '<b>Testing</b>',
    'footer' => 'Random text....',
], [
    'button' => [
        'title' => 'Open Modal',
    ],
]);
echo '<hr>';

echo '<h4>Pagination</h4>';
echo pagination(range(1, 6), [
    'link'    => 'page.php?p=%s',
    'current' => 3,
]);
echo '<hr>';

echo '<h4>Progress</h4>';
echo progress(40);
echo progress([43 => 'Test']);
echo progress([13, 30, 50], [
    'color' => ['error', 'success'],
]);
echo progress([15 => 'First', 30 => 'Second', 55 => 'Third'], [
    'color' => ['error', 'warning', 'success'],
]);
echo progress([20, 75], [
    'auto_colors' => function (int $num): string {
        $class = 'error';
        if ($num > 71) {
            $class = 'success';
        } else if ($num > 55) {
            $class = '';
        } else if ($num > 25) {
            $class = 'warning';
        } else if ($num < 25) {
            $class = 'error';
        }

        return $class;
    },
]);
echo '<hr>';

echo '<h4>Tabs</h4>';
echo tabs('test', [
    ['title' => 'Tab 1', 'content' => 'Content 1'],
    ['title' => 'Tab 2', 'content' => 'Content 2', 'active' => true],
    ['title' => 'Tab 3', 'content' => 'Content 3'],
]);
echo '<hr>';

echo '<div>Other components W.I.P.</div>';

echo closecontainer();

$body = ob_get_contents();
ob_end_clean();
echo layout($body);
