<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

/**
 * Get UI Kit object.
 *
 * Note: No need to create this function, it only overrides defaults when using helpers.
 *
 * @return RobiNN\UiKit\UiKit
 */
function get_ui(): RobiNN\UiKit\UiKit {
    $config = new RobiNN\UiKit\Config([
        'cache'     => __DIR__.'/cache',
        'debug'     => true,
        'framework' => isset($_GET['sm']) ? 'semanticui2' : 'bootstrap5', // for development purposes
    ]);

    return RobiNN\UiKit\UiKit::getInstance($config);
}

ob_start();

echo container_open(false, ['attributes' => ['style' => 'padding-top: 3rem;padding-bottom: 3rem;']]);

echo '<div style="text-align:center;margin-bottom:3rem;">
<h1>PHP UI Kit Examples</h1>
<h2>Current CSS Framework: <b>'.get_ui()->config->getFramework().'</b></h2>';

if (get_ui()->config->getFramework() === 'bootstrap5') {
    echo '<p><a href="/examples/?sm">Open Semantic UI version</a></p>';
} else {
    echo '<p><a href="/examples/">Open Bootstrap 5 version</a></p>';
}

echo '<p>This file shows the basic usage of all components.</p>
Examples: <a href="/examples/twig/">Entire page written in Twig</a>.
</div>';

echo '<h3>Forms</h3>';
echo form_open('post', '', ['attributes' => ['style' => 'margin-top:20px;']]);

echo '<h5>Input sizes</h5>';
echo row_open();
echo grid_open([100, 33]);
echo input('input-small', 'Small', '', ['size' => 'sm']);
echo grid_close().grid_open([100, 33]);
echo input('input-defult', 'Default');
echo grid_close().grid_open([100, 33]);
echo input('input-large', 'Large', '', ['size' => 'lg']);
echo grid_close();
echo row_close();

echo '<h5>Inputs with states</h5>';
// In Semantic (Fomantic) UI states works only inside .ui.form element
echo row_open();
echo grid_open([100, 50]);
echo input('input-success', 'Success', '', ['state' => 'success', 'required' => true]);
echo grid_close().grid_open([100, 50]);
echo input('input-error', 'Error', '', ['state' => 'error']);
echo grid_close();
echo row_close();

echo row_open();
echo grid_open([100, 50]);
echo input('input-success2', 'Success field with text', '', ['state' => 'success', 'feedback_text' => 'Text...']);
echo grid_close().grid_open([100, 50]);
echo input('input-error2', 'Error field with text', '', ['state' => 'error', 'feedback_text' => 'Text...']);
echo grid_close();
echo row_close();

echo '<h5>Inputs with addons</h5>';
echo row_open();
echo grid_open([100, 33]);
echo input('input-left-addon', 'Left addon', '', ['left_addon' => '€']);
echo grid_close().grid_open([100, 33]);
echo input('input-right-addon', 'Right addon', '', ['right_addon' => '@site.com']);
echo grid_close().grid_open([100, 33]);
echo input('input-addons', 'Addons', '', ['left_addon' => '€', 'right_addon' => ',00']);
echo grid_close();
echo row_close();

echo '<h5>Inputs with button</h5>';
echo row_open();
echo grid_open([100, 33]);
echo input('input-left-action-button', 'Left action button', '', ['left_custom' => button('Left')]);
echo grid_close().grid_open([100, 33]);
echo input('input-right-action-button', 'Right action button', '', ['right_custom' => button('Right')]);
echo grid_close().grid_open([100, 33]);
echo input('input-action-buttons', 'Action buttons', '', [
    'left_custom'  => button('Left'),
    'right_custom' => button('Right'),
]);
echo grid_close();
echo row_close();

echo form_close();

echo '<hr>';

echo '<h3>Components</h3>';

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
echo '<div style="display:block;margin-bottom:20px;">';
echo button_group($btns, ['size' => 'sm',]);
echo '</div>';
echo '<div style="display:block;margin-bottom:20px;">';
echo button_group($btns);
echo '</div>';
echo '<div style="display:block;margin-bottom:20px;">';
echo button_group($btns, ['size' => 'lg',]);
echo '</div>';
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
echo menu('example', [
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
echo modal('example', [
    'title'  => 'Modal title',
    'header' => 'idk',
    'body'   => 'Modal body',
    'footer' => 'Random text...',
], [
    'button' => [
        'title' => 'Open Modal',
    ],
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
echo tabs('example', [
    ['title' => 'Tab 1', 'content' => 'Content 1'],
    ['title' => 'Tab 2', 'content' => 'Content 2'],
    ['title' => 'Tab 3', 'content' => 'Content 3'],
]);
echo '<hr>';

echo '<div>Other components W.I.P.</div>';

echo container_close();

$body = ob_get_contents();
ob_end_clean();
echo layout($body, [
    'title' => 'PHP UI Kit Examples',
]);
