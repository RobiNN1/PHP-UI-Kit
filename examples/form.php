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

echo '<h1 class="h1" id="form">Form</h1>';
echo form_open();

echo '<h2 class="h2" id="input">Input</h2>';

echo '<h3 class="h3">Input sizes</h3>';
echo row_open().grid_open([100, '1/3']);
echo input('input-small', 'Small', '', ['size' => 'sm',]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-defult', 'Default');
echo grid_close().grid_open([100, '1/3']);
echo input('input-large', 'Large', '', ['size' => 'lg',]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Input states</h3>';
echo row_open().grid_open([100, '1/2']);
echo input('input-success', 'Success', '', ['state' => 'success',]);
echo grid_close().grid_open([100, '1/2']);
echo input('input-error', 'Error', '', ['state' => 'error',]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Input with feedback & help text</h3>';
echo row_open().grid_open([100, '1/3']);
echo input('input-error-feedback', 'Error input with text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please enter text',
]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-help', 'Input with help text', '', [
    'help_text' => 'Text must be 10-100 characters long',
]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-feedback-help', 'Input with feedback and help text', '', [
    'state'         => 'success',
    'feedback_text' => 'Please enter text',
    'help_text'     => 'Text must be 10-100 characters long',
]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Input with addons</h3>';
echo row_open().grid_open([100, '1/3']);
echo input('input-left-addon', 'Left addon', '', [
    'left_addon' => '€',
]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-right-addon', 'Right addon', '', [
    'right_addon' => '@site.com',
]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-addons', 'Addons', '', [
    'left_addon'  => '€',
    'right_addon' => ',00',
]);
echo grid_close().row_close();

echo row_open().grid_open([100, '1/3']);
echo input('input-left-action-button', 'Left action button', '', [
    'left_custom' => button('Left'),
]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-right-action-button', 'Right action button', '', [
    'right_custom' => button('Right'),
]);
echo grid_close().grid_open([100, '1/3']);
echo input('input-action-buttons', 'Action buttons', '', [
    'left_custom'  => button('Left'),
    'right_custom' => button('Right'),
]);
echo grid_close().row_close();

echo '<p class="note">Note: Everything can be combined, but in some cases you need to add your own css.</p>';
echo row_open().grid_open([100, '1/2', '1/4']);
echo input('input-addon-combined', 'Combined addons', '', [
    'left_addon'   => '€',
    'right_custom' => button('Right'),
]);
echo grid_close().grid_open([100, '1/2', '1/4']);
echo input('input-addon-combined2', 'Combined addons 2', '', [
    'right_addon' => '€',
    'left_custom' => button('Left'),
]);
echo grid_close().row_close();

echo '<h2 class="h2" id="select">Select</h2>';

$select_items = [
    'item1',
    'item2',
    'item3',
];

echo '<h3 class="h3">Select sizes</h3>';
echo row_open().grid_open([100, '1/3']);
echo select('select-small', 'Small', '', $select_items, ['size' => 'sm',]);
echo grid_close().grid_open([100, '1/3']);
echo select('select-defult', 'Default', '', $select_items);
echo grid_close().grid_open([100, '1/3']);
echo select('select-large', 'Large', '', $select_items, ['size' => 'lg',]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Select states</h3>';
echo row_open().grid_open([100, '1/2']);
echo select('select-success', 'Success', '', $select_items, ['state' => 'success',]);
echo grid_close().grid_open([100, '1/2']);
echo select('select-error', 'Error', '', $select_items, ['state' => 'error',]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Select with feedback & help text</h3>';
echo row_open().grid_open([100, '1/3']);
echo select('select-error-feedback', 'Error select with text', '', $select_items, [
    'state'         => 'error',
    'feedback_text' => 'Please enter text',
]);
echo grid_close().grid_open([100, '1/3']);
echo select('select-help', 'Select with help text', '', $select_items, [
    'help_text' => 'Text must be 10-100 characters long',
]);
echo grid_close().grid_open([100, '1/3']);
echo select('select-feedback-help', 'Select with feedback and help text', '', $select_items, [
    'state'         => 'success',
    'feedback_text' => 'Please enter text',
    'help_text'     => 'Text must be 10-100 characters long',
]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Select multiple</h3>';

echo row_open().grid_open([100, '1/2', '1/4']);
echo select('select-multiple', 'Select multiple', '', $select_items, [
    'multiple'    => true,
    'placeholder' => 'Select items',
]);
echo grid_close().grid_open([100, '1/2', '1/4']);
echo select('select-multiple-success', 'Select multiple success', '', $select_items, [
    'multiple'    => true,
    'placeholder' => 'Select items',
    'state'       => 'success',
]);
echo grid_close().row_close();

echo '<h2 class="h2" id="textarea">Textarea</h2>';

echo row_open().grid_open([100, '1/3']);
echo textarea('example', 'Example textarea');
echo grid_close().grid_open([100, '1/3']);
echo textarea('textarea-success', 'Success', '', ['state' => 'success',]);
echo grid_close().grid_open([100, '1/3']);
echo textarea('textarea-error', 'Error', '', ['state' => 'error',]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Textarea with feedback & help text</h3>';
echo row_open().grid_open([100, '1/3']);
echo textarea('textarea-error-feedback', 'Error textarea with text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please enter text',
]);
echo grid_close().grid_open([100, '1/3']);
echo textarea('textarea-help', 'Textarea with help text', '', [
    'help_text' => 'Text must be 10-100 characters long',
]);
echo grid_close().grid_open([100, '1/3']);
echo textarea('textarea-feedback-help', 'Textarea with feedback and help text', '', [
    'state'         => 'success',
    'feedback_text' => 'Please enter text',
    'help_text'     => 'Text must be 10-100 characters long',
]);
echo grid_close().row_close();

echo '<h2 class="h2" id="checkbox">Checkbox</h2>';

echo checkbox('example-checkbox', 'Example checkbox');
echo checkbox('example-radio', 'Example radio', 0, ['radio' => true,]);

echo '<hr><h3 class="h3">Multiple checkboxes</h3>';
echo row_open().grid_open([100, '1/2']);
echo checkbox('example-multiple', 'Example checkboxes', '', [
    'items' => [
        0 => 'Checkbox 1',
        1 => 'Checkbox 2',
        2 => 'Checkbox 3',
    ],
]);
echo grid_close().grid_open([100, '1/2']);
echo checkbox('example-radio-multiple', 'Example radio checkboxes', '', [
    'items' => [
        0 => 'Radio checkbox 1',
        1 => 'Radio checkbox 2',
        2 => 'Radio checkbox 3',
    ],
    'radio' => true,
]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Checkbox states</h3>';
echo row_open().grid_open([100, '1/2']);
echo checkbox('checkbox-success', 'Success', 0, ['state' => 'success',]);
echo checkbox('checkbox-error', 'Error', 0, ['state' => 'error',]);
echo grid_close().grid_open([100, '1/2']);
echo checkbox('radio-success', 'Success', 0, [
    'state' => 'success',
    'radio' => true,
]);
echo checkbox('radio-error', 'Error', 0, [
    'state' => 'error',
    'radio' => true,
]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Checkbox with feedback & help text</h3>';
echo row_open().grid_open([100, '1/3']);
echo checkbox('checkbox-error-feedback', 'Error checkbox with text', 0, [
    'state'         => 'error',
    'feedback_text' => 'Please check this',
]);
echo grid_close().grid_open([100, '1/3']);
echo checkbox('checkbox-help', 'Checkbox with help text', 0, [
    'help_text' => 'Text..',
]);
echo grid_close().grid_open([100, '1/3']);
echo checkbox('radio-feedback-help', 'Radio with feedback and help text', 0, [
    'state'         => 'success',
    'feedback_text' => 'Please check this',
    'help_text'     => 'Text...',
    'radio'         => true,
]);
echo grid_close().row_close();

echo '<hr><h3 class="h3">Checkbox with feedback & help text - multiple</h3>';
echo row_open().grid_open([100, '1/3']);
echo checkbox('checkbox-error-feedback-multiple', 'Error checkbox with text - multiple', '', [
    'items'         => [
        0 => 'Checkbox 1',
        1 => 'Checkbox 2',
        2 => 'Checkbox 3',
    ],
    'state'         => 'error',
    'feedback_text' => 'Please check this',
]);
echo grid_close().grid_open([100, '1/3']);
echo checkbox('checkbox-help-multiple', 'Checkbox with help text - multiple', '', [
    'items'     => [
        0 => 'Checkbox 1',
        1 => 'Checkbox 2',
        2 => 'Checkbox 3',
    ],
    'help_text' => 'Text..',
]);
echo grid_close().grid_open([100, '1/3']);
echo checkbox('radio-feedback-help-multiple', 'Radio with feedback and help text - multiple', '', [
    'items'         => [
        0 => 'Radio checkbox 1',
        1 => 'Radio checkbox 2',
        2 => 'Radio checkbox 3',
    ],
    'state'         => 'success',
    'feedback_text' => 'Please check this',
    'help_text'     => 'Text...',
    'radio'         => true,
]);
echo grid_close().row_close();

echo form_close();
