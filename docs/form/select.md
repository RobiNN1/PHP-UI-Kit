# select()

Show select field.

---

```php {.function-name}
select( string $name [, string $label = '', mixed $value = '', array $items = [], array $options = [] ] ) : string
```

## Parameters

$name (string) (Required) Select name.

$label (string) (Optional) Select label.

$value (string|int) (Optional) Select value.

$items (array) (Optional) Select options - array or associative array.

$options (array) (Optional) Additional options.

#### Available options

| Name              | Type   | Default   | Description                                                                            |
|-------------------|--------|-----------|----------------------------------------------------------------------------------------|
| id                | string | ''        | Wrapper ID.                                                                            |
| class             | string | ''        | Class for wrapper.                                                                     |
| attributes        | array  | []        | Array of custom attributes.                                                            |
| select_id         | string | $name     | Select ID.                                                                             |
| select_class      | string | ''        | Select class.                                                                          |
| select_attributes | array  | []        | Array of custom attributes for select.                                                 |
| placeholder       | string | ''        | Placeholder.                                                                           |
| size              | string | 'default' | Select size. Possible value: default/sm/lg                                             |
| state             | string | ''        | Validation state. Possible value: success/error                                        |
| feedback_text     | string | ''        | Custom feedback text. Do validation in your code and then set state and feedback text. |
| required          | bool   | false     | Required.                                                                              |
| help_text         | string | ''        | Custom help text.                                                                      |
| multiple          | bool   | false     | Multiple.                                                                              |

## Basic Usage

```php
echo select('example', 'Example select', '', [
    'item1',
    'item2',
    'item3',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="example" class="form-label">Example select</label>
    <select id="example" name="example" class="form-select" aria-label="Example select">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
</div>
```

## Sizes

```php
echo select('select-small', 'Small', '', [
    'item1',
    'item2',
    'item3',
], [
    'size' => 'sm',
]);

echo select('select-defult', 'Default', '', [
    'item1',
    'item2',
    'item3',
],);

echo select('select-large', 'Large', '', [
    'item1',
    'item2',
    'item3',
], [
    'size' => 'lg',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="select-small" class="form-label">Small</label>
    <select id="select-small" name="select-small" class="form-select form-select-sm" aria-label="Small">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
</div>

<div class="mb-1">
    <label for="select-defult" class="form-label">Default</label>
    <select id="select-defult" name="select-defult" class="form-select" aria-label="Default">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
</div>

<div class="mb-1">
    <label for="select-large" class="form-label">Large</label>
    <select id="select-large" name="select-large" class="form-select form-select-lg" aria-label="Large">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
</div>
```

## States

```php
echo select('select-success', 'Success', '', [
    'item1',
    'item2',
    'item3',
], [
    'state' => 'success',
]);

echo select('select-error', 'Error', '', [
    'item1',
    'item2',
    'item3',
], [
    'state' => 'error',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="select-success" class="form-label">Success</label>
    <select id="select-success" name="select-success" class="form-select is-valid" aria-label="Success">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
</div>

<div class="mb-1">
    <label for="select-error" class="form-label">Error</label>
    <select id="select-error" name="select-error" class="form-select is-invalid" aria-label="Error">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
</div>
```

## Feedback & help text

```php
echo select('select-error-feedback', 'Error select with text', '', [
    'item1',
    'item2',
    'item3',
], [
    'state' => 'error',
    'feedback_text' => 'Please select item',
]);

echo select('select-help', 'Select with help text', '', [
    'item1',
    'item2',
    'item3',
], [
    'help_text' => 'Something..',
]);

echo select('select-feedback-help', 'Select with feedback and help text', '', [
    'item1',
    'item2',
    'item3',
], [
    'state'         => 'error',
    'feedback_text' => 'Please select item',
    'help_text'     => 'Something..',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="select-error-feedback" class="form-label">Error select with text</label>
    <select id="select-error-feedback" name="select-error-feedback" class="form-select is-invalid" aria-label="Error select with text">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
    <div class="invalid-feedback">Please select item</div>
</div>

<div class="mb-1">
    <label for="select-help" class="form-label">Select with help text</label>
    <select id="select-help" name="select-help" class="form-select" aria-label="Select with help text">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
    <div class="form-text">Something..</div>
</div>

<div class="mb-1">
    <label for="select-feedback-help" class="form-label">Select with feedback and help text</label>
    <select id="select-feedback-help" name="select-feedback-help" class="form-select is-invalid" aria-label="Select with feedback and help text">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2">item3</option>
    </select>
    <div class="invalid-feedback">Please select item</div>
    <div class="form-text">Something..</div>
</div>
```
