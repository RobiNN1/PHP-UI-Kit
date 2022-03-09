# alert()

Render alert.

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

## Return Values

(string)

## Basic Usage

```php
echo alert('Default');
```

Output

```html
<div class="alert alert-primary" role="alert"> Default </div>
```
