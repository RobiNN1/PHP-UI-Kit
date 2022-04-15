# grid()

Use grid to build layouts of all shapes.

---

grid_open( [ array $col_sizes, array $options ] ) : string

## Parameters

$col_sizes (array) (Optional) Column sizes. Default value: [100]

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                                      |
|------------|--------|---------|--------------------------------------------------|
| class      | string | ''      | Class for wrapper.                               |
| attributes | array  | []      | Array of custom attributes.                      |

## Basic Usage

```php
echo grid_open(); // 100% column width
// ...
echo grid_close();
```

HTML output:

```xhtml
<div class="col-xs-12">
</div>
```

## Another possible values 

100% of width on mobile, 50% on larger screen.
Depending on the framework, multiple values can be added, however the recommended maximum is 4 values.

```php
echo grid_open([100, 50]);
// ...
echo grid_close();
```

HTML output:

```xhtml
<div class="col-xs-12 col-sm-6">
</div>
```

It is also possible to specify a value for a specific framework, in this case the first and second values are ignored.

```php
echo grid_open([100, 50, ['bootstrap5' => 'col-6',],]);
// ...
echo grid_close();
```

HTML output:

```xhtml
<div class="col-6">
</div>
```

The same column width. 
Not recommended for layouts that must support multiple css frameworks. Since not every framework support this.

```php
echo grid_open(['auto']);
// ...
echo grid_close();
```

HTML output:

```xhtml
<div class="col">
</div>
```
