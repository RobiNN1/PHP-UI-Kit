# alert()

Contextual feedback messages for typical user actions.

---

alert( string $text [, string $color, array $options ] ) : string

## Parameters

$text (string) (Required) Alert text.

$color (string) (Optional) Alert color. Possible value: default|success|warning|error|info Default value: 'default'

$options (array) (Optional) Additional options. Default value: []

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

HTML output:

```html
<div class="alert alert-primary" role="alert"> Default </div>
```
