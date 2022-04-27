# button_group()

Show a group of buttons together in one line.

---

button_group( array $items [, array $options = [] ] ) : string

## Parameters

$items (array) (Required) Associative array or multidimensional array, `button-value => title` or array with options.

When is used `button-value => options` method, is possible to set these options:

| Name        | Type            | Default   | Description                                                           |
|-------------|-----------------|-----------|-----------------------------------------------------------------------|
| title       | string          | ''        | Button title. Required when is used `button-value => options` method. |
| value       | int/string/null | Array key | Button value, when is set to null attribute will be removed.          |
| link        | string          | ''        | Link.                                                                 |                                         |
| type        | string          | 'button'  | Button type. Possible value: button/submit/reset                      |
| class       | string          | ''        | Button class.                                                         |
| btn_options | array           | []        | Button options, see [available button options](button.md).            |

> All these options can be set via btn_options,
> but for convenience a common options (title, value, link, type and class) is possible to set directly.

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type   | Default   | Description                                                       |
|------------|--------|-----------|-------------------------------------------------------------------|
| id         | string | ''        | Wrapper ID.                                                       |
| class      | string | ''        | Class for wrapper.                                                |
| attributes | array  | []        | Array of custom attributes.                                       |
| size       | string | 'default' | Button group size. Possible value: default/sm/lg                  |
| type       | string | 'button'  | Default type for all buttons. Possible value: button/submit/reset |
| item_class | string | ''        | Class for item.                                                   |

## Basic Usage

```php
echo button_group([
    0 => 'First',
    1 => 'Second',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="btn-group" role="group">
    <button type="button" class="btn btn-secondary" value="0">First</button>
    <button type="button" class="btn btn-secondary" value="1">Second</button>
</div>
```

## Misc buttons and values

```php
echo button_group([
    0          => 'First',
    1          => 'Second',
    'example'  => ['title' => 'Link', 'link' => 'link.php', 'btn_options' => ['color' => 'primary',],],
    'savedata' => ['title' => 'Submit', 'type' => 'submit', 'btn_options' => ['color' => 'success', 'name' => 'savedata',],],
    'btn1'     => ['title' => 'No value', 'btn_options' => ['value' => null,],],
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="btn-group" role="group">
    <button type="button" class="btn btn-secondary" value="0">First</button>
    <button type="button" class="btn btn-secondary" value="1">Second</button>
    <a href="link.php" class="btn btn-primary">Link</a>
    <button type="submit" class="btn btn-success" name="savedata" value="savedata">Submit</button>
    <button type="button" class="btn btn-secondary">No value</button>
</div>
```

## Sizes

```php
echo button_group([
    0 => 'First',
    1 => 'Second',
], [
    'size' => 'sm',
]);

echo button_group([
    0 => 'First',
    1 => 'Second',
]);

echo button_group([
    0 => 'First',
    1 => 'Second',
], [
    'size' => 'lg',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="btn-group btn-group-sm" role="group">
    <button type="button" class="btn btn-secondary" value="0">First</button>
    <button type="button" class="btn btn-secondary" value="1">Second</button>
</div>

<div class="btn-group" role="group">
    <button type="button" class="btn btn-secondary" value="0">First</button>
    <button type="button" class="btn btn-secondary" value="1">Second</button>
</div>

<div class="btn-group btn-group-lg" role="group">
    <button type="button" class="btn btn-secondary" value="0">First</button>
    <button type="button" class="btn btn-secondary" value="1">Second</button>
</div>
```
