# alert()

Contextual feedback messages for typical user actions.

---

```php {.function-name}
alert( string $text [, string $color = 'default', array $options = [] ] ) : string
```

## Parameters

$text (string) (Required) Alert text.

$color (string) (Optional) Alert color. Possible value: default|success|warning|error|info

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| id         | string | ''      | Alert ID.                   |
| class      | string | ''      | Alert class.                |
| attributes | array  | []      | Array of custom attributes. |
| dismiss    | bool   | false   | Make alert dismissable.     |

## Basic Usage

```php
echo alert('Default');
```

<span class="html-output">HTML Output</span>

```html
<div class="alert alert-primary" role="alert">Default</div>
```

## Colors

```php
echo alert('Default');

echo alert('Success', 'success');

echo alert('Warning', 'warning');

echo alert('Error', 'error');

echo alert('Info', 'info');
```

<span class="html-output">HTML Output</span>

```html
<div class="alert alert-primary" role="alert">Default</div>
<div class="alert alert-success" role="alert">Success</div>
<div class="alert alert-warning" role="alert">Warning</div>
<div class="alert alert-danger" role="alert">Error</div>
<div class="alert alert-info" role="alert">Info</div>
```

## Dismissing

By setting `dismiss` to true user can hide the alert.

```php
echo alert('Dismissible', 'default', [
    'dismiss' => true,
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="alert alert-primary alert-dismissible" role="alert">
    Dismissible
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
```
