# checkbox()

Render checkbox field.

---

```php {.function-name}
checkbox( string $name [, string $label = '', mixed $value = 0, array $options = [] ] ) : string
```

## Parameters

$name (string) (Required) Checkbox name.

$label (string) (Optional) Checkbox label.

$value (string|int) (Optional) Checkbox value.

$options (array) (Optional) Additional options.

#### Available options

| Name                | Type   | Default | Description                                                                            |
|---------------------|--------|---------|----------------------------------------------------------------------------------------|
| id                  | string | ''      | Wrapper ID.                                                                            |
| class               | string | ''      | Class for wrapper.                                                                     |
| attributes          | array  | []      | Array of custom attributes.                                                            |
| items               | array  | []      | Multiple checkbox items - associative array.                                           |
| checkbox_id         | string | $name   | Checkbox ID.                                                                           |
| checkbox_attributes | array  | []      | Array of custom attributes for checkbox.                                               |
| radio               | bool   | false   | Change to radio checkbox.                                                              |
| state               | string | ''      | Validation state. Possible value: success/error                                        |
| feedback_text       | string | ''      | Custom feedback text. Do validation in your code and then set state and feedback text. |
| required            | bool   | false   | Required.                                                                              |
| help_text           | string | ''      | Custom help text.                                                                      |

## Basic Usage

```php
echo checkbox('example', 'Example checkbox');

echo checkbox('example-radio', 'Example radio', 0, [
    'radio' => true,
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="form-check">
    <input value="0" type="checkbox" id="example" name="example" class="form-check-input" aria-label="Example checkbox">
    <label for="example" class="form-check-label">Example checkbox</label>
</div>

<div class="form-check">
    <input value="0" type="radio" id="example-radio" name="example-radio" class="form-check-input" aria-label="Example radio">
    <label for="example-radio" class="form-check-label">Example radio</label>
</div>
```

## Multiple checkboxes

```php
echo checkbox('example-multiple', 'Example checkboxes', '', [
    'items' => [
        0 => 'Checkbox 1',
        1 => 'Checkbox 2',
        2 => 'Checkbox 3',
    ],
]);

echo checkbox('example-radio-multiple', 'Example radio checkboxes', '', [
    'items' => [
        0 => 'Radio checkbox 1',
        1 => 'Radio checkbox 2',
        2 => 'Radio checkbox 3',
    ],
    'radio' => true,
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <span>Example checkboxes</span>
    <div class="form-check">
        <input value="0" type="checkbox" id="example-multiple0" name="example-multiple[]" class="form-check-input">
        <label for="example-multiple0" class="form-check-label">Checkbox 1</label>
    </div>
    <div class="form-check">
        <input value="1" type="checkbox" id="example-multiple1" name="example-multiple[]" class="form-check-input">
        <label for="example-multiple1" class="form-check-label">Checkbox 2</label>
    </div>
    <div class="form-check">
        <input value="2" type="checkbox" id="example-multiple2" name="example-multiple[]" class="form-check-input">
        <label for="example-multiple2" class="form-check-label">Checkbox 3</label>
    </div>
</div>

<div class="mb-1">
    <span>Example radio checkboxes</span>
    <div class="form-check">
        <input value="0" type="radio" id="example-radio-multiple0" name="example-radio-multiple" class="form-check-input">
        <label for="example-radio-multiple0" class="form-check-label">Radio checkbox 1</label>
    </div>
    <div class="form-check">
        <input value="1" type="radio" id="example-radio-multiple1" name="example-radio-multiple" class="form-check-input">
        <label for="example-radio-multiple1" class="form-check-label">Radio checkbox 2</label>
    </div>
    <div class="form-check">
        <input value="2" type="radio" id="example-radio-multiple2" name="example-radio-multiple" class="form-check-input">
        <label for="example-radio-multiple2" class="form-check-label">Radio checkbox 3</label>
    </div>
</div>
```

## States

```php
echo checkbox('checkbox-success', 'Success', 0, [
    'state' => 'success',
]);

echo checkbox('checkbox-error', 'Error', 0, [
    'state' => 'error',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="form-check">
    <input value="0" type="checkbox" id="checkbox-success" name="checkbox-success" class="form-check-input is-valid" aria-label="Success">
    <label for="checkbox-success" class="form-check-label">Success</label>
</div>

<div class="form-check">
    <input value="0" type="checkbox" id="checkbox-error" name="checkbox-error" class="form-check-input is-invalid" aria-label="Error">
    <label for="checkbox-error" class="form-check-label">Error</label>
</div>
```

## Feedback & help text

```php
echo checkbox('checkbox-error-feedback', 'Error checkbox with text', 0, [
    'state' => 'error',
    'feedback_text' => 'Please check this',
]);

echo checkbox('checkbox-help', 'Checkbox with help text', 0, [
    'help_text' => 'Text..',
]);

echo checkbox('checkbox-feedback-help', 'Checkbox with feedback and help text', 0, [
    'state'         => 'error',
    'feedback_text' => 'Please check this',
    'help_text'     => 'Text...',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="form-check">
    <input value="0" type="checkbox" id="checkbox-error-feedback" name="checkbox-error-feedback" class="form-check-input is-invalid" aria-label="Error checkbox with text">
    <label for="checkbox-error-feedback" class="form-check-label">Error checkbox with text</label>
    <div class="invalid-feedback">Please check this</div>
</div>

<div class="form-check">
    <input value="0" type="checkbox" id="checkbox-help" name="checkbox-help" class="form-check-input" aria-label="Checkbox with help text">
    <label for="checkbox-help" class="form-check-label">Checkbox with help text</label>
    <div class="form-text">Text..</div>
</div>

<div class="form-check">
    <input value="0" type="checkbox" id="checkbox-feedback-help" name="checkbox-feedback-help" class="form-check-input is-invalid" aria-label="Checkbox with feedback and help text">
    <label for="checkbox-feedback-help" class="form-check-label">Checkbox with feedback and help text</label>
    <div class="invalid-feedback">Please check this</div>
    <div class="form-text">Text...</div>
</div>
```
