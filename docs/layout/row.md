# row()

Group of columns.

---

```php {.function-name}
row_open( [ array $options = [] ] ) : string
```

## Parameters

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type   | Default | Description                                      |
|------------|--------|---------|--------------------------------------------------|
| class      | string | ''      | Class for wrapper.                               |
| attributes | array  | []      | Array of custom attributes.                      |

## Basic Usage

```php
echo row_open();
// ...
echo row_close();
```

HTML output:

```xhtml
<div class="row">
</div>
```
