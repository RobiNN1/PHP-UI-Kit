# badge()

Render badge.

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

HTML output:

```html
<span class="badge bg-secondary">Default</span>
```
