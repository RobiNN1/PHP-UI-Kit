# dropdown()

Render dropdown.

---

dropdown( string $title, array $items [, array $options ] ) : string

## Parameters

$title (string) (Required) Button title.

$items (array) (Required) Multidimensional array.

Options for each item:

| Name   | Type   | Default | Description                                                                  |
|--------|--------|---------|------------------------------------------------------------------------------|
| title  | string | ''      | Item title                                                                   |
| link   | string | ''      | Item link.                                                                   |
| class  | string | ''      | Item class.                                                                  |
| custom | string | ''      | Custom HTML in item. If this option is specified, other options are ignored. |

Add `'divider',` item to create divider.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                                                |
|------------|--------|---------|------------------------------------------------------------|
| id         | string | ''      | Dropdown ID.                                               |
| class      | string | ''      | Class for wrapper.                                         |
| attributes | array  | []      | Array of custom attributes.                                |
| item_class | string | ''      | Class for item.                                            |
| button     | array  | []      | Button options, see [Available button options](button.md). |

## Return Values

(string)

## Basic Usage

```php
echo dropdown('Dropdown', [
    ['title' => 'Item 1', 'link' => 'link1.php'],
    'divider',
    ['title' => 'Item 2'],
]);
```

Output

```html
<div class="dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Item 1</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><span class="dropdown-item-text">Item 2</span></li>
    </ul>
</div>
```
