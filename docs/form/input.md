# input()

Show input field with a variety of addons.

---

input( string $name [, string $label = '', mixed $value = '', array $options = [] ] ) : string

## Parameters

$name (string) (Required) Input name.

$label (string) (Optional) Input label.

$value (string|int) (Optional) Input value.

$options (array) (Optional) Additional options.

#### Available options

| Name             | Type   | Default   | Description                                                                            |
|------------------|--------|-----------|----------------------------------------------------------------------------------------|
| id               | string | ''        | Wrapper ID.                                                                            |
| class            | string | ''        | Class for wrapper.                                                                     |
| attributes       | array  | []        | Array of custom attributes.                                                            |
| input_id         | string | $name     | Input ID.                                                                              |
| input_class      | string | ''        | Input class.                                                                           |
| input_attributes | array  | []        | Array of custom attributes for input.                                                  |
| placeholder      | string | ''        | Placeholder.                                                                           |
| type             | string | 'text'    | Input type.                                                                            |
| size             | string | 'default' | Input size. Possible value: default/sm/lg                                              |
| state            | string | ''        | Validation state. Possible value: success/error                                        |
| feedback_text    | string | ''        | Custom feedback text. Do validation in your code and then set state and feedback text. |
| required         | bool   | false     | Required.                                                                              |
| help_text        | string | ''        | Custom help text.                                                                      |
| left_addon       | string | ''        | Left addon.                                                                            |
| right_addon      | string | ''        | Right addon.                                                                           |
| left_custom      | string | ''        | Left custom addon.                                                                     |
| right_custom     | string | ''        | Right custom addon.                                                                    |

## Basic Usage

```php
echo input('example', 'Example input');
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="example" class="form-label">Example input</label>
    <input value="" type="text" id="example" name="example" class="form-control" aria-label="Example input">
</div>
```

## Sizes

```php
echo input('input-small', 'Small', '', [
    'size' => 'sm',
]);

echo input('input-defult', 'Default');

echo input('input-large', 'Large', '', [
    'size' => 'lg',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="input-small" class="form-label">Small</label>
    <input value="" type="text" id="input-small" name="input-small" class="form-control form-control-sm" aria-label="Small">
</div>

<div class="mb-1">
    <label for="input-defult" class="form-label">Default</label>
    <input value="" type="text" id="input-defult" name="input-defult" class="form-control" aria-label="Default">
</div>

<div class="mb-1">
    <label for="input-large" class="form-label">Large</label>
    <input value="" type="text" id="input-large" name="input-large" class="form-control form-control-lg" aria-label="Large">
</div>
```

## States

```php
echo input('input-success', 'Success', '', [
    'state' => 'success',
]);

echo input('input-error', 'Error', '', [
    'state' => 'error',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="input-success" class="form-label">Success</label>
    <input value="" type="text" id="input-success" name="input-success" class="form-control is-valid" aria-label="Success">
</div>

<div class="mb-1">
    <label for="input-error" class="form-label">Error</label>
    <input value="" type="text" id="input-error" name="input-error" class="form-control is-invalid" aria-label="Error">
</div>
```

## Feedback & help text

```php
echo input('input-error-feedback', 'Error input with text', '', [
    'state' => 'error',
    'feedback_text' => 'Please enter text',
]);

echo input('input-help', 'Input with help text', '', [
    'help_text' => 'Text must be 10-100 characters long',
]);

echo input('input-feedback-help', 'Input with feedback and help text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please enter text',
    'help_text'     => 'Text must be 10-100 characters long',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="input-error-feedback" class="form-label">Error input with text</label>
    <input value="" type="text" id="input-error-feedback" name="input-error-feedback" class="form-control is-invalid" aria-label="Error input with text">
    <div class="invalid-feedback">Please enter text</div>
</div>

<div class="mb-1">
    <label for="input-help" class="form-label">Input with help text</label>
    <input value="" type="text" id="input-help" name="input-help" class="form-control" aria-label="Input with help text">
    <div class="form-text">Text must be 10-100 characters long</div>
</div>

<div class="mb-1">
    <label for="input-feedback-help" class="form-label">Input with feedback and help text</label>
    <input value="" type="text" id="input-feedback-help" name="input-feedback-help" class="form-control is-invalid" aria-label="Input with feedback and help text">
    <div class="invalid-feedback">Please enter text</div>
    <div class="form-text">Text must be 10-100 characters long</div>
</div>
```

## Addons

```php
echo input('username', 'Username', '', [
    'left_addon' => '@',
]);

echo input('search-input', '', '', [
    'placeholder'  => 'Search...',
    'right_custom' => button('Search'),
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="username" class="form-label">Username</label>
    <div class="input-group">
        <span class="input-group-text">@</span>
        <input value="" type="text" id="username" name="username" class="form-control" aria-label="Username">
    </div>
</div>

<div class="mb-1">
    <div class="input-group">
        <input value="" type="text" id="search-input" name="search-input" placeholder="Search..." class="form-control" aria-label="">
        <button type="button" class="btn btn-secondary">Search</button>
    </div>
</div>
```
