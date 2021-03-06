# layout()

Show site layout.

---

```php {.function-name}
layout( string $body [, array $options = [] ] ) : string
```

## Parameters

$body (string) (Required) Site content.

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type   | Default  | Description                               |
|------------|--------|----------|-------------------------------------------|
| lang       | string | 'en'     | Site lang (used for html lang attribute). |
| title      | string | 'UI Kit' | Site title.                               |
| attributes | array  | []       | Array of custom attributes.               |
| minify_css | bool   | true     | Minify CSS code.                          |

## Basic Usage

```php
echo layout('Body content', [
    'title' => 'Site Title',
]);
```

HTML output:

```xhtml
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Title</title>
    <link rel="stylesheet" href="path/to/bs/css/bootstrap.min.css">
</head>
<body>
Body content
<script src="path/to/bs/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```
