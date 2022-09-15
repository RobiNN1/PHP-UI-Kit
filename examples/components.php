<?php
declare(strict_types=1);

echo '<h3 id="components">Components</h3>';

echo '<h4>Accordion</h4>';
echo accordion('example', [
    'Title 1' => 'Content 1',
    'Title 2' => 'Content 2',
]);
echo '<hr>';

echo '<h4>Alert</h4>';
echo row_open();
echo grid_open([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Default');
echo grid_close();
echo grid_open([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Success', 'success');
echo grid_close();
echo grid_open([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Warning', 'warning');
echo grid_close();
echo grid_open([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Error', 'error');
echo grid_close();
echo grid_open([100, 15, ['bootstrap5' => 'auto']]);
echo alert('Info', 'info', ['dismiss' => true]);
echo grid_close();
echo row_close();
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
    'Link 1' => 'blink1.php',
    'Link 2' => 'blink2.php',
]);
echo breadcrumbs([
    'Link 1' => 'blink1.php',
    'Link 2' => 'blink2.php',
], [
    'divider' => '>',
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
echo button('No default CSS', '', ['no_classes' => true]);
echo '<hr>';

echo '<h4>Button group</h4>';
$btns = [
    0          => 'First',
    1          => 'Second',
    'example'  => ['title' => 'Link', 'link' => 'link.php', 'btn_options' => ['color' => 'primary']],
    'savedata' => ['title' => 'Submit', 'type' => 'submit', 'btn_options' => ['color' => 'success', 'name' => 'savedata']],
    'btn1'     => ['title' => 'No value', 'value' => null],
];
echo button_group($btns, ['size' => 'sm']);
echo button_group($btns);
echo button_group($btns, ['size' => 'lg']);
echo '<hr>';

echo '<h4>Card</h4>';
echo row_open();
echo grid_open([100, 50]);
echo card([
    'header' => 'Header',
    'body'   => 'Body',
    'footer' => 'Footer',
]);
echo grid_close();
echo grid_open([100, 50]);
echo card([
    'body' => '
    <h3>Title</h3>
    <h4>Sub title</h4>
    <p>Text</p>
    ',
]);
echo grid_close();
echo row_close();
echo '<hr>';

echo '<h4>Carousel</h4>';
echo carousel('example', [
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
    ['title' => 'Dropdown Item 1', 'link' => 'link1.php'],
    'divider',
    ['title' => 'Dropdown Item 2'],
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
$menu_content = [
    ['title' => 'Item 1', 'link' => 'link1.php'],
    ['custom' => button('Button')->options(['class' => 'navbar-btn'], 'bootstrap3')],
    ['custom' => get_ui()->button
        ->options(['color' => 'success'])
        ->attributes(['style' => 'margin-left:10px'], ['bootstrap3', 'bootstrap4', 'bootstrap5']) // This will be applied only when BS is loaded
        ->options(['class' => 'navbar-btn'], 'bootstrap3') // This will be applied only when BS3 is loaded
        ->render('Button success'), // The render method must be called last in order to apply options, such as color
    ],
    ['title' => 'Item 2', 'link' => 'link2.php', 'active' => true],
    [
        'title' => 'Dropdown',
        ['title' => 'Sub Item 1', 'link' => 'sub_link1.php'],
        ['title' => 'Sub Item 2', 'link' => 'sub_link2.php'],
    ],
    'right' => [
        ['custom' => button('Button 2')->options(['class' => 'navbar-btn'], 'bootstrap3')],
        ['title' => 'Right 1', 'link' => 'right1.php'],
        ['title' => 'Right 2', 'link' => 'right2.php'],
        [
            'title' => 'Right Dropdown',
            ['title' => 'Sub Right Item 1', 'link' => 'sub_right_link1.php'],
            ['title' => 'Sub Right Item 2', 'link' => 'sub_right_link2.php'],
        ],
    ],
];

echo menu('example', $menu_content);
echo menu('example-dark', $menu_content, [
    'dark' => true,
]);
echo '<hr>';

echo '<h4>Modal</h4>';
$modal_content = [
    'title'  => 'Modal title',
    'header' => 'idk',
    'body'   => 'Modal body',
    'footer' => 'Random text...',
];

echo modal('example-default', $modal_content, [
    'button' => [
        'title' => 'Open Default Modal',
    ],
]);
echo modal('example-sm', $modal_content, [
    'button' => [
        'title' => 'Open Sm Modal',
    ],
    'size'   => 'sm',
]);
echo modal('example-lg', $modal_content, [
    'button' => [
        'title' => 'Open Lg Modal',
    ],
    'size'   => 'lg',
]);
echo modal('example-fullscreen', $modal_content, [
    'button' => [
        'title' => 'Open Fullscreen Modal',
    ],
    'size'   => 'fullscreen',
]);
echo '<hr>';

echo '<h4>Pagination</h4>';
echo pagination(range(1, 6), [
    'link' => 'page.php?p=%s',
]);
echo '<hr>';

echo '<h4>Progress</h4>';
echo progress(40);
echo progress([43 => 'example']);
echo progress([13, 30, 50], [
    'color' => ['error', 'success'],
]);
echo progress([15 => 'First', 30 => 'Second', 55 => 'Third'], [
    'color' => ['error', 'warning', 'success'],
]);
echo progress([20, 75], [
    'auto_colors' => static function (int $num): string {
        $class = 'error';
        if ($num > 71) {
            $class = 'success';
        } elseif ($num > 55) {
            $class = '';
        } elseif ($num > 25) {
            $class = 'warning';
        } elseif ($num < 25) {
            $class = 'error';
        }

        return $class;
    },
]);
echo '<hr>';

echo '<h4>Tabs</h4>';
echo tabs('example', [
    ['title' => 'Tab 1', 'content' => 'Content 1'],
    ['title' => 'Tab 2', 'content' => 'Content 2'],
    ['title' => 'Tab 3', 'content' => 'Content 3'],
]);
