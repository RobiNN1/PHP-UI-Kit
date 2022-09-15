<?php
declare(strict_types=1);

echo '<h3 id="form">Form</h3>';

echo form_open('post', '', ['attributes' => ['style' => 'margin-top:20px;']]);
echo '<h4 id="input">Input</h4>';

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
