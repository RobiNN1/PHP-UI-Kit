# progress()

Render progress.

---

progress( mixed $percent [, array $options ] ) : string

## Parameters

$percent (int|array) (Required) Percents, array or asociative array for multiple bars.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name        | Type         | Default   | Description                                                                                        |
|-------------|--------------|-----------|----------------------------------------------------------------------------------------------------|
| id          | string       | ''        | Wrapper ID.                                                                                        |
| class       | string       | ''        | Class for wrapper.                                                                                 |
| attributes  | array        | []        | Array of custom attributes.                                                                        |
| item_class  | string       | ''        | Class for item.                                                                                    |
| color       | string/array | 'default' | Progress bar background color. Or array with colors. Possible value: default/success/warning/error |
| auto_colors | object       | null      | Function that set the color depending on the width of the bar.                                     |
| percents    | bool         | true      | Show percents in title.                                                                            |

## Return Values

(string)

## Basic Usage

```php
echo progress(40);
```

Output

```html
<div class="progress mb-2">
    <div class="progress-bar" style="width: 40%;">40%</div>
</div>
```

**Auto colors and multiple values**

```php
echo progress([20, 75], [
    'auto_colors' => function (int $num): string {
        $class = 'error';
        if ($num > 71) {
            $class = 'success';
        } else if ($num > 55) {
            $class = '';
        } else if ($num > 25) {
            $class = 'warning';
        } else if ($num < 25) {
            $class = 'error';
        }

        return $class;
    },
]);
```

Output

```html
<div class="progress mb-2">
    <div class="progress-bar bg-danger" style="width: 20%;">20%</div>
    <div class="progress-bar bg-success" style="width: 75%;">75%</div>
</div>
```

**With titles and different colors**

```php
// In this case every bar will have title and different color
echo progress([15 => 'First', 30 => 'Second', 55 => 'Third'], [
    'color' => ['error', 'warning', 'success'],
]);
```

Output

```html
<div class="progress mb-2">
    <div class="progress-bar bg-danger" style="width: 15%;">First 15%</div>
    <div class="progress-bar bg-warning" style="width: 30%;">Second 30%</div>
    <div class="progress-bar bg-success" style="width: 55%;">Third 55%</div>
</div>
```
