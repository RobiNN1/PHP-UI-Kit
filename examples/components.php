<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

echo '<h1 class="h1" id="components">Components</h2>';

echo '<h2 class="h2" id="accordion">Accordion</h2>';
echo accordion('example', [
    'Accordion Item #1' => '<strong>This is the first item\'s accordion body.</strong>',
    'Accordion Item #2' => '<strong>This is the second item\'s accordion body.</strong>',
]);

echo '<h2 class="h2" id="alert">Alert</h2>';
echo row_open().grid_open(['auto', 100, '1/6']);
echo alert('Default');
echo grid_close();
echo grid_open(['auto', 100, '1/6']);
echo alert('Success', 'success');
echo grid_close();
echo grid_open(['auto', 100, '1/6']);
echo alert('Warning', 'warning');
echo grid_close();
echo grid_open(['auto', 100, '1/6']);
echo alert('Error', 'error');
echo grid_close();
echo grid_open(['auto', 100, '1/6']);
echo alert('Info', 'info', ['dismiss' => true,]);
echo grid_close().row_close();

echo '<h2 class="h2" id="badge">Badge</h2>';
echo badge('Default');
echo badge('Primary', 'primary');
echo badge('Success', 'success');
echo badge('Warning', 'warning');
echo badge('Error', 'error');
echo badge('Info', 'info');
echo badge('Rounded', 'default', ['rounded' => true,]);

echo '<h2 class="h2" id="breadcrumbs">Breadcrumbs</h2>';
echo breadcrumbs(['Link 1' => 'blink1.php', 'Link 2' => 'blink2.php',])
    ->attributes(['style' => 'display:block;'], 'fomanticui2');
echo breadcrumbs(['Link 1' => 'blink1.php', 'Link 2' => 'blink2.php',], ['divider' => '>',]);

echo '<h2 class="h2" id="button">Button</h2>';
echo button('Default');
echo button('Primary', 'button', ['color' => 'primary',]);
echo button('Success', 'button', ['color' => 'success',]);
echo button('Warning', 'button', ['color' => 'warning',]);
echo button('Error', 'button', ['color' => 'error',]);
echo button('Info', 'button', ['color' => 'info',]);
echo button('Small', 'button', ['size' => 'sm',]);
echo button('Default');
echo button('Large', 'button', ['size' => 'lg',]);
echo button('Link', '', ['link' => 'link.php',]);
echo button('Active', '', ['active' => true,]);
echo button('Disabled', '', ['disabled' => true,]);
echo button('No default CSS', '', ['no_classes' => true,]);

echo '<h2 class="h2" id="buttongroup">ButtonGroup</h2>';
$btns = [
    0      => 'Btn1',
    'btn2' => ['title' => 'Link', 'link' => 'link.php', 'btn_options' => ['color' => 'primary'],],
    'btn3' => ['title' => 'No value', 'value' => null, 'btn_options' => ['color' => 'success'],],
];
echo button_group($btns, ['size' => 'sm',]);
echo button_group($btns);
echo button_group($btns, ['size' => 'lg',]);

echo '<h2 class="h2" id="card">Card</h2>';
echo row_open().grid_open([100, '1/3']);
echo card([
    'header' => 'Header',
    'body'   => 'Body',
    'footer' => 'Footer',
]);
echo grid_close().grid_open([100, '1/3']);
echo card([
    'body' => '
    <h3>Title</h3>
    <h4>Sub title</h4>
    <p>Text</p>
    ',
]);
echo grid_close().grid_open([100, '1/3']);
echo card([
    'top_img' => [
        'src' => 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22824%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20'.
            'viewBox%3D%220%200%20824%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1834217842e%20'.
            'text%20%7B%20fill%3A%235f656b%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3B'.
            'font-size%3A41pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1834217842e%22%3E%3Crect%20width%3D%22824%22%20height%3D%22250%22%20'.
            'fill%3D%22%23868e96%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22212.9875030517578%22%20y%3D%22143.4800006866455%22%3EExample%20image%3C%2F'.
            'text%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E',
        'alt' => 'Example image',
    ],
    'body'    => 'Card body',
]);
echo grid_close().row_close();

echo '<h2 class="h2" id="carousel">Carousel</h2>';
echo carousel('example', [
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">First slide</text>
    </svg>',
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">Second slide</text>
    </svg>',
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">Third slide</text>
    </svg>',
]);

echo '<h2 class="h2" id="dropdown">Dropdown</h2>';
echo '<p class="note">Note: Dark variant might not be available for all frameworks.</p>';
echo dropdown('Dropdown', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    'divider',
    ['title' => 'Item'],
    ['custom' => '<b style="padding: 1rem;">Custom bold text</b>'],
])->attributes(['style' => 'display:inline-block;margin-right:10px;']);
echo dropdown('Dark dropdown', [
    ['title' => 'Link 1', 'link' => 'darklink1.php'],
    ['title' => 'Item'],
], [
    'dark' => true,
])->attributes(['style' => 'display:inline-block;margin-right:10px;']);
echo dropdown('Custom button', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    ['title' => 'Link 2', 'link' => 'link2.php'],
], [
    'button' => ['color' => 'success', 'size' => 'lg',],
])->attributes(['style' => 'display:inline-block;margin-right:10px;']);
echo dropdown('Dropdown button as link', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    ['title' => 'Link 2', 'link' => 'link2.php'],
    ['title' => 'Link 3', 'link' => 'link3.php'],
], [
    'button' => ['link' => '#', 'no_classes' => true,],
])->attributes(['style' => 'display:inline-block;margin-right:10px;']);

echo '<h2 class="h2" id="listgroup">ListGroup</h2>';
echo row_open().grid_open([100, '1/3']);
echo list_group([
    'Item 1',
    'Item 2',
    'Item 3',
]);
echo grid_close().grid_open([100, '1/3']);
echo list_group([
    ['title' => 'Link1', 'link' => 'link1.php'],
    ['title' => 'Link2', 'link' => 'link2.php', 'active' => true],
    ['title' => 'Link3', 'link' => 'link3.php'],
]);
echo grid_close().grid_open([100, '1/3']);
echo list_group([
    'Item 1',
    'Item 2',
    ['title' => 'Link', 'link' => 'link.php'],
]);
echo grid_close().row_close();

echo '<h2 class="h2" id="menu">Menu</h2>';
echo menu('example', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    [
        'custom' => (string) button('Button') // Any HTML
        ->options(['class' => 'navbar-btn'], 'bootstrap3'),
    ],
    // Dropdown, you can use all dropdown options (e.g. divider) as well
    [
        'title' => 'Dropdown', // Title is required for dropdown button
        ['title' => 'Sub Link 1', 'link' => 'sub_link1.php'],
        ['title' => 'Sub Link 2', 'link' => 'sub_link2.php'],
    ],
    // Items on the right side
    'right' => [
        ['title' => 'Right Link 1', 'link' => 'right1.php'],
        ['title' => 'Right Link 2', 'link' => 'right2.php'],
    ],
], [
    'brand' => [
        'title' => 'Brand title',
        'link'  => 'link..',
    ],
]);

echo '<p class="note">Note: Dark variant might not be available for all frameworks.</p>';
echo menu('example-dark', [
    [
        'custom' => (string) button('Button', 'button', ['color' => 'success'])
            ->options(['class' => 'navbar-btn'], 'bootstrap3'),
    ],
    ['title' => 'Link 1', 'link' => 'link1.php'],
    'right' => [
        [
            'title' => 'Dropdown',
            ['title' => 'Sub Link 1', 'link' => 'sub_link1.php'],
            ['title' => 'Sub Link 2', 'link' => 'sub_link2.php'],
        ],
        ['title' => 'Right Link 1', 'link' => 'right1.php'],
    ],
], [
    'dark' => true,
]);

echo '<h2 class="h2" id="modal">Modal</h2>';
$modal_content = [
    'title'  => 'Modal title',
    'header' => 'idk',
    'body'   => 'Modal body',
    'footer' => 'Random text...',
];

echo '<p class="note">Note: Some variants (e.g. fullscreen) might not be available for all frameworks.</p>';
echo modal('example-default', $modal_content, ['button' => ['title' => 'Open Default Modal',],]);
echo modal('example-sm', $modal_content, ['button' => ['title' => 'Open Sm Modal',], 'size' => 'sm',]);
echo modal('example-lg', $modal_content, ['button' => ['title' => 'Open Lg Modal',], 'size' => 'lg',]);
echo modal('example-fullscreen', $modal_content, ['button' => ['title' => 'Open Fullscreen Modal',], 'size' => 'fullscreen',]);

echo '<h2 class="h2" id="pagination">Pagination</h2>';
echo pagination(range(1, 6), ['link' => 'page.php?p=%s',]);

echo '<h2 class="h2" id="progress">Progress</h2>';
echo progress(40);
echo progress([43 => 'example']);
echo progress([13, 30, 50], ['color' => ['error', 'success'],]);
echo progress([15 => 'First', 30 => 'Second', 55 => 'Third'], ['color' => ['error', 'warning', 'success'],]);
echo progress([20, 75], [
    'auto_colors' => static function (int $num): string {
        $class = 'default';

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

echo '<h2 class="h2" id="tabs">Tabs</h2>';
echo tabs('example', [
    ['title' => 'Tab 1', 'content' => 'Content 1'],
    ['title' => 'Tab 2', 'content' => 'Content 2'],
    ['title' => 'Tab 3', 'content' => 'Content 3'],
]);
