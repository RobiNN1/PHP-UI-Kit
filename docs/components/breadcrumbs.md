# breadcrumbs()

Render breadcrumbs.

---

breadcrumbs( array $links [, array $options ] ) : string

## Parameters

$links (array) (Required) Associative array link-title => link.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| id         | string | ''      | Wrapper ID.                 |
| class      | string | ''      | Class for wrapper.          |
| attributes | array  | []      | Array of custom attributes. |
| item_class | string | ''      | Class for item.             |

## Return Values

(string)

## Basic Usage

```php
echo breadcrumbs([
    'Link 1' => 'link1.php',
    'Link 2' => 'link2.php',
])
```

Output

```html
<ol class="breadcrumb" aria-label="breadcrumb">
    <li class="breadcrumb-item"><a href="link1.php">Link 1</a></li>
    <li class="breadcrumb-item active" aria-current="page">Link 2</li>
</ol>
```
