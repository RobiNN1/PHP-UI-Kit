# list_group()

Display a series of items inside a single element.

---

```php {.function-name}
list_group( array $items [, array $options = [] ] ) : string
```

## Parameters

$items (array) (Required) Array of items or multidimensional array.

Options for each item (links only):

| Name       | Type   | Default | Description         |
|------------|--------|---------|---------------------|
| title      | string | ''      | Item title          |
| link       | string | ''      | Item link.          |
| class      | string | ''      | Item class.         |
| new_window | bool   | false   | Open in new window. |
| active     | bool   | false   | Active state.       |

$options (array) (Optional) Additional options.

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
    'Item 3',
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<div class="list-group">
    <div class="list-group-item">Item 1</div>
    <div class="list-group-item">Item 2</div>
    <div class="list-group-item">Item 3</div>
</div>
```

## With links

```php
echo list_group([
    ['title' => 'Link1', 'link' => 'link1.php'],
    ['title' => 'Link2', 'link' => 'link2.php', 'active' => true],
    ['title' => 'Link3', 'link' => 'link3.php'],
]);

echo list_group([
    'Item 1',
    'Item 2',
    ['title' => 'Link', 'link' => 'link.php'],
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<div class="list-group">
    <a class="list-group-item list-group-item-action" href="link1.php">Link1</a>
    <a class="list-group-item list-group-item-action active" href="link2.php">Link2</a>
    <a class="list-group-item list-group-item-action" href="link3.php">Link3</a>
</div>

<div class="list-group">
    <div class="list-group-item">Item 1</div>
    <div class="list-group-item">Item 2</div>
    <a class="list-group-item list-group-item-action" href="link.php">Link</a>
</div>
```
