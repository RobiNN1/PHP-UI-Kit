# badge()

Show extra information like counts or labels.

---

badge( string $text [, string $color, array $options ] ) : string

## Parameters

$text (string) (Required) Badge text.

$color (string) (Optional) Badge color. Possible value: default|primary|success|warning|error|info Default value: 'default'

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| id         | string | ''      | Badge ID.                   |
| class      | string | ''      | Badge class.                |
| attributes | array  | []      | Array of custom attributes. |
| rounded    | bool   | false   | Rounded badge.              |

## Basic Usage

```php
echo badge('Default');
```

<span class="html-output">HTML Output</span>

```html
<span class="badge bg-secondary">Default</span>
```

## Colors

```php
echo badge('Default');

echo badge('Primary', 'primary');

echo badge('Success', 'success');

echo badge('Warning', 'warning');

echo badge('Error', 'error');

echo badge('Info', 'info');
```

<span class="html-output">HTML Output</span>

```html
<span class="badge bg-secondary">Default</span>
<span class="badge bg-primary">Primary</span>
<span class="badge bg-success">Success</span>
<span class="badge bg-warning">Warning</span>
<span class="badge bg-danger">Error</span>
<span class="badge bg-info">Info</span>
```

## Rounded

To make the badges more rounded, set `rounded` to true.

```php
echo badge('Rounded', 'default', [
    'rounded' => true,
]);
```

<span class="html-output">HTML Output</span>

```html
<span class="badge bg-secondary rounded-pill">Rounded</span>
```
