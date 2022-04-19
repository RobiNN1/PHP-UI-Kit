# container()

Display content to reasonable maximum width.

---

container_open( [ bool $fluid, array $options ] ) : string

## Parameters

$fluid (bool) (Optional) Container without maximum width. Default value: ''

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                                      |
|------------|--------|---------|--------------------------------------------------|
| class      | string | ''      | Class for wrapper.                               |
| attributes | array  | []      | Array of custom attributes.                      |

## Basic Usage

```php
echo container_open();
// ...
echo container_close();
```

HTML output:

```xhtml
<div class="container">
</div>
```
