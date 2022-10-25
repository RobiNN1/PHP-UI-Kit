# grid()

Use grid to build layouts of all shapes.

---

```php {.function-name}
grid_open( [ array $col_sizes = [100], array $options = [] ] ) : string
```

## Parameters

$col_sizes (array) (Optional) Column sizes.

$options (array) (Optional) Additional options.

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

## Column sizes

Depending on the framework, multiple values can be added.
However, the recommended maximum is 4 values.

In the example below, the output will be
100% width on mobile, 50% on a larger screen.

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

It is also possible to specify a value for a specific framework.
In this case, the first and second values are ignored.

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
Not recommended for layouts that must support multiple css frameworks.
Since not every framework supports this.

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

## Fractions

A more convenient way is to use fractions instead of writing percentages directly.

Note: Percentages and fractions can be used together.
An under-the-hood system converts fractions to percentages.

```php
echo grid_open(['1/1', '1/2']); // is the same as [100, 50]
// ...
echo grid_close();
```

HTML output:

```xhtml
<div class="col-xs-12 col-sm-6">
</div>
```
