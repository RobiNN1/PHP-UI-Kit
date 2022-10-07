# textarea()

Render textarea field.

---

```php {.function-name}
textarea( string $name [, string $label = '', mixed $value = '', array $options = [] ] ) : string
```

## Parameters

$name (string) (Required) Textarea name.

$label (string) (Optional) Textarea label.

$value (string|int) (Optional) Textarea value.

$options (array) (Optional) Additional options.

#### Available options

| Name                | Type   | Default | Description                                                                            |
|---------------------|--------|---------|----------------------------------------------------------------------------------------|
| id                  | string | ''      | Wrapper ID.                                                                            |
| class               | string | ''      | Class for wrapper.                                                                     |
| attributes          | array  | []      | Array of custom attributes.                                                            |
| textarea_id         | string | $name   | Textarea ID.                                                                           |
| textarea_class      | string | ''      | Textarea class.                                                                        |
| textarea_attributes | array  | []      | Array of custom attributes for textarea.                                               |
| placeholder         | string | ''      | Placeholder.                                                                           |
| state               | string | ''      | Validation state. Possible value: success/error                                        |
| feedback_text       | string | ''      | Custom feedback text. Do validation in your code and then set state and feedback text. |
| required            | bool   | false   | Required.                                                                              |
| disabled            | bool   | false   | Disabled.                                                                              |
| readonly            | bool   | false   | Readonly.                                                                              |
| help_text           | string | ''      | Custom help text.                                                                      |
| rows                | int    | 4       | Textarea rows.                                                                         |

## Basic Usage

```php
echo textarea('example', 'Example textarea');
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="example" class="form-label">Example textarea</label>
    <textarea id="example" name="example" rows="4" class="form-control"></textarea>
</div>
```

## States

```php
echo textarea('textarea-success', 'Success', '', [
    'state' => 'success',
]);

echo textarea('textarea-error', 'Error', '', [
    'state' => 'error',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="textarea-success" class="form-label">Success</label>
    <textarea id="textarea-success" name="textarea-success" rows="4" class="form-control is-valid"></textarea>
</div>

<div class="mb-1">
    <label for="textarea-error" class="form-label">Error</label>
    <textarea id="textarea-error" name="textarea-error" rows="4" class="form-control is-invalid"></textarea>
</div>
```

## Feedback & help text

```php
echo textarea('textarea-error-feedback', 'Error textarea with text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please enter text',
]);

echo textarea('textarea-help', 'Textarea with help text', '', [
    'help_text' => 'Something..',
]);

echo textarea('textarea-feedback-help', 'Textarea with feedback and help text', '', [
    'state'         => 'error',
    'feedback_text' => 'Please select text',
    'help_text'     => 'Something..',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="mb-1">
    <label for="textarea-error-feedback" class="form-label">Error textarea with text</label>
    <textarea id="textarea-error-feedback" name="textarea-error-feedback" rows="4" class="form-control is-invalid"></textarea>
    <div class="invalid-feedback">Please enter text</div>
</div>

<div class="mb-1">
    <label for="textarea-help" class="form-label">Textarea with help text</label>
    <textarea id="textarea-help" name="textarea-help" rows="4" class="form-control"></textarea>
    <div class="form-text">Something..</div>
</div>

<div class="mb-1">
    <label for="textarea-feedback-help" class="form-label">Textarea with feedback and help text</label>
    <textarea id="textarea-feedback-help" name="textarea-feedback-help" rows="4" class="form-control is-invalid"></textarea>
    <div class="invalid-feedback">Please select text</div>
    <div class="form-text">Something..</div>
</div>
```
