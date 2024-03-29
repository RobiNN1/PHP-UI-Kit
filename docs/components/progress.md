# progress()

Show the completion of progress.

---

```php {.function-name}
progress( mixed $percent [, array $options = [] ] ) : string
```

## Parameters

$percent (int|array) (Required) Percentage, an array or asociative array for multiple bars.

$options (array) (Optional) Additional options.

#### Available options

| Name        | Type         | Default   | Description                                                                                        |
|-------------|--------------|-----------|----------------------------------------------------------------------------------------------------|
| id          | string       | ''        | Wrapper ID.                                                                                        |
| class       | string       | ''        | Class for wrapper.                                                                                 |
| attributes  | array        | []        | Array of custom attributes.                                                                        |
| item_class  | string       | ''        | Class for item.                                                                                    |
| color       | string/array | 'default' | Progress bar background color. Or array with colors. Possible value: default/success/warning/error |
| auto_colors | object       | null      | Function that sets the color depending on the width of the bar.                                    |
| percents    | bool         | true      | Show percent in title.                                                                             |

## Basic Usage

```php
echo progress(40);
```

<span class="html-output">HTML Output</span>

```html
<div class="progress mb-2">
    <div class="progress-bar" style="width: 40%;">40%</div>
</div>
```

## Auto colors and multiple values

```php
echo progress([20, 75,], [
    'auto_colors' => static function (int $num): string {
        $class = 'default';
        if ($num > 71) {
            $class = 'success';
        } elseif ($num > 55) {
            $class = '';
        } elseif ($num > 25) {
            $class = 'warning';
        } elseif ($num < 25) {
            $class = 'error';
        }

        return $class;
    },
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="progress mb-2">
    <div class="progress-bar bg-danger" style="width: 20%;">20%</div>
    <div class="progress-bar bg-success" style="width: 75%;">75%</div>
</div>
```

## With titles and different colors

In this case, every bar will have a title and different color.

```php
echo progress([15 => 'First', 30 => 'Second', 55 => 'Third',], [
    'color' => ['error', 'warning', 'success'],
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="progress mb-2">
    <div class="progress-bar bg-danger" style="width: 15%;">First 15%</div>
    <div class="progress-bar bg-warning" style="width: 30%;">Second 30%</div>
    <div class="progress-bar bg-success" style="width: 55%;">Third 55%</div>
</div>
```
