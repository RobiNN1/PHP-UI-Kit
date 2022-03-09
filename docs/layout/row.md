# Row

Render row.

---

row_open( [ array $options ] ) : string

## Parameters

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                                      |
|------------|--------|---------|--------------------------------------------------|
| class      | string | ''      | Class for wrapper.                               |
| attributes | array  | []      | Array of custom attributes.                      |

## Return Values

(string)

## Basic Usage

```php
echo row_open();
// ...
echo row_close();
```

Output

```html
<div class="row">
</div>
```
