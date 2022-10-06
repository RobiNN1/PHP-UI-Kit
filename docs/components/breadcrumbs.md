# breadcrumbs()

Show the current page's location in a hierarchical structure.

---

```php {.function-name}
breadcrumbs( array $links [, array $options = [] ] ) : string
```

## Parameters

$links (array) (Required) Associative array `link-title => link`.

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| id         | string | ''      | Wrapper ID.                 |
| class      | string | ''      | Class for wrapper.          |
| attributes | array  | []      | Array of custom attributes. |
| item_class | string | ''      | Class for item.             |
| divider    | string | '/'     | Items divider.              |

## Basic Usage

```php
echo breadcrumbs([
    'Home'    => 'index.php',
    'Library' => 'library.php',
    'Data'    => 'data.php',
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<ol class="breadcrumb" aria-label="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="library.php">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
</ol>
```

## Dividers

Dividers can be changed by adding `divider`.

```php
echo breadcrumbs([
    'Home'    => 'index.php',
    'Library' => 'library.php',
    'Data'    => 'data.php',
], [
    'divider' => '>',
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<ol class="breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="library.php">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
</ol>
```
