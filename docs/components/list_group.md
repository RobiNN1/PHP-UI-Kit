# list_group()

Display a series of items inside a single element.

---

list_group( array $items [, array $options ] ) : string

## Parameters

$items (array) (Required) Array of items.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| id         | string | ''      | Wrapper ID.                 |
| class      | string | ''      | Class for wrapper.          |
| attributes | array  | []      | Array of custom attributes. |
| item_class | string | ''      | Class for item.             |

## Basic Usage

```php
echo list_group([
    'Item 1',
    'Item 2',
]);
```

<span class="html-output">HTML Output</span>

```html

<ul class="list-group">
    <li class="list-group-item">Item 1</li>
    <li class="list-group-item">Item 2</li>
</ul>
```
