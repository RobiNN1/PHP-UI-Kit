# Grid

Render grid.

---

grid_open( [ mixed $col_sizes, array $options ] ) : string

## Parameters

$col_sizes (array|string) (Optional) Column sizes. Default value: [100]

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
echo grid_open(); // 100% column width
// ...
echo grid_close();
```

Output

```html
<div class="col-xs-12">
</div>
```

**Another possible values**

```php
// 100% of width on mobile, 50% on larger screen. Depending on framework, you can add multiple values however recommended maximum is 4 values.
echo grid_open([100, 50]); // <div class="col-xs-12 col-sm-6">

// You can even specify a value for a specific framework, in this case the first and second values are ignored.
echo grid_open([100, 50, ['bootstrap5' => 'col-6']]); // <div class="col-6">

// Columns will have the same width. Not recommended for layouts that must support multiple css frameworks. Since not every framework support this.
echo grid_open('auto'); // <div class="col">
```
