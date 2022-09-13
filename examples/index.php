<?php

declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

/**
 * Get a UI Kit object.
 *
 * Note: No need to create this function, it only overrides defaults when using helpers.
 *
 * @return RobiNN\UiKit\UiKit
 */
function get_ui(): RobiNN\UiKit\UiKit {
    return new RobiNN\UiKit\UiKit([
        'cache'     => __DIR__.'/cache',
        'debug'     => true,
        'framework' => $_GET['fw'] ?? 'bootstrap5',
    ]);
}

ob_start();

echo container_open(false, ['attributes' => ['style' => 'padding-top: 3rem;padding-bottom: 3rem;']]);

echo '<div style="text-align:center;margin-bottom:3rem;">
<h1>PHP UI Kit Examples</h1>
<h2>Current CSS Framework: <strong>'.get_ui()->config->getFramework().'</strong></h2>';

foreach (array_keys(get_ui()->config->getAllFrameworks()) as $framework) {
    $active = isset($_GET['fw']) && $_GET['fw'] === $framework ? ' style="font-weight:bold;"' : '';
    echo '<p><a'.$active.' href="?fw='.$framework.'">Open '.$framework.' version</a></p>';
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
// In Fomantic UI states work only inside .ui.form element
echo row_open();
echo grid_open([100, 50]);
echo input('input-success', 'Success field with text', '', ['state' => 'success', 'feedback_text' => 'Text']);
echo grid_close().grid_open([100, 50]);
echo input('input-error', 'Error field with text', '', ['state' => 'error', 'feedback_text' => 'Another Text...']);
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

echo '<hr>';

$select_optioms = [
    'item1',
    'item2',
    'item3',
];

echo '<h5>Select sizes</h5>';
echo row_open();
echo grid_open([100, 33]);
echo select('select-small', 'Small', '', $select_optioms, ['size' => 'sm']);
echo grid_close().grid_open([100, 33]);
echo select('select-defult', 'Default', '', $select_optioms);
echo grid_close().grid_open([100, 33]);
echo select('select-large', 'Large', '', $select_optioms, ['size' => 'lg']);
echo grid_close();
echo row_close();

echo '<h5>Selects with states</h5>';
echo row_open();
echo grid_open([100, 50]);
echo select('select-success', 'Success', '', $select_optioms, ['state' => 'success', 'required' => true]);
echo grid_close().grid_open([100, 50]);
echo select('select-error', 'Error', '', $select_optioms, ['state' => 'error']);
echo grid_close();
echo row_close();

echo row_open();
echo grid_open([100, 50]);
echo select('select-success2', 'Success field with text', '', $select_optioms, ['state' => 'success', 'feedback_text' => 'Text...']);
echo grid_close().grid_open([100, 50]);
echo select('select-error2', 'Error field with text', '', $select_optioms, ['state' => 'error', 'feedback_text' => 'Text...']);
echo grid_close().grid_open([100, 50]);
echo select('select-multiple', 'Select multiple', '', $select_optioms, ['multiple' => true, 'placeholder' => 'Select items']);
echo grid_close();
echo row_close();

echo '<h5>Checkbox & Radio</h5>';
echo checkbox('checkbox', 'Checkbox');
echo checkbox('radio', 'Radio', '', ['radio' => true]);

echo row_open();
echo grid_open([100, 50]);
echo checkbox('multiple-radios', 'Multiple radios', '', [
    'radio'         => true,
    'items'         => [
        0 => 'Radio 1',
        1 => 'Radio 2',
        2 => 'Radio 3',
    ],
    'state'         => 'error',
    'feedback_text' => 'Text....',
    'help_text'     => 'Help text',
]);
echo grid_close().grid_open([100, 50]);
echo checkbox('multiple-checkboxes', 'Multiple checkboxes', '', [
    'items'         => [
        0 => 'Checkbox 1',
        1 => 'Checkbox 2',
        2 => 'Checkbox 3',
    ],
    'state'         => 'success',
    'feedback_text' => 'Text....',
    'help_text'     => 'Help text',
]);
echo grid_close();
echo row_close();

echo '<h5>Textarea</h5>';
echo row_open();
echo grid_open([100, 25]);
echo textarea('textarea', 'Textarea');
echo grid_close().grid_open([100, 25]);
echo textarea('textarea-disabled', 'Disabled textarea', '...', ['disabled' => true]);
echo grid_close().grid_open([100, 25]);
echo textarea('textarea-readonly', 'Readonly textarea', '...', ['readonly' => true]);
echo grid_close();
echo row_close();

echo row_open();
echo grid_open([100, 25]);
echo textarea('textarea-state', 'Textarea with state', 'Text..', [
    'state'         => 'success',
    'feedback_text' => 'Text....',
    'help_text'     => 'Help text',
    'required'      => true,
]);
echo grid_close().grid_open([100, 25]);
echo textarea('textarea-error-feedback', 'Error textarea with text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please enter text',
]);
echo grid_close().grid_open([100, 25]);
echo textarea('textarea-help', 'Textarea with help text', '', [
    'help_text' => 'Something..',
]);
echo grid_close().grid_open([100, 25]);
echo textarea('textarea-feedback-help', 'Textarea with feedback and help text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please select text',
    'help_text'     => 'Something..',
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

echo container_close();

echo layout((string) ob_get_clean(), [
    'title' => 'PHP UI Kit Examples',
]);
