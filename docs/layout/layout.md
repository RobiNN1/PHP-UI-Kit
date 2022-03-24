# layout()

Render site layout.

---

layout( string $body [, array $options ] ) : string

## Parameters

$body (string) (Required) Site content.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default  | Description                               |
|------------|--------|----------|-------------------------------------------|
| lang       | string | 'en'     | Site lang (used for html lang attribute). |
| title      | string | 'UI Kit' | Site title.                               |
| attributes | array  | []       | Array of custom attributes.               |

## Return Values

(string)

## Basic Usage

```php
echo layout('Body content');
```

Output

```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UI Kit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
Body content
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```