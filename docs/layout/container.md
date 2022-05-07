# container()

Display content to reasonable maximum width.

---

```php {.function-name}
container_open( [ bool $fluid = false, array $options = [] ] ) : string
```

## Parameters

$fluid (bool) (Optional) Container without maximum width.

$options (array) (Optional) Additional options.

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
