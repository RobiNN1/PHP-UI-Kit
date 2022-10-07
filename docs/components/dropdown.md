# dropdown()

Show a list of items displayed as a menu.

---

```php {.function-name}
dropdown( string $title, array $items [, array $options = [] ] ) : string
```

## Parameters

$title (string) (Required) Button title.

$items (array) (Required) Multidimensional array.

Options for each item:

| Name       | Type   | Default | Description                                                                  |
|------------|--------|---------|------------------------------------------------------------------------------|
| title      | string | ''      | Item title                                                                   |
| link       | string | ''      | Item link.                                                                   |
| class      | string | ''      | Item class.                                                                  |
| new_window | bool   | false   | Open in new window.                                                          |
| active     | bool   | false   | Active state.                                                                |
| custom     | string | ''      | Custom HTML in item. If this option is specified, other options are ignored. |

> To create divider add `'divider',` item.

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type   | Default | Description                                                |
|------------|--------|---------|------------------------------------------------------------|
| id         | string | ''      | Dropdown ID.                                               |
| class      | string | ''      | Class for wrapper.                                         |
| attributes | array  | []      | Array of custom attributes.                                |
| item_class | string | ''      | Class for item.                                            |
| dark       | bool   | false   | Dark dropdown.                                             |
| button     | array  | []      | Button options, see [available button options](button.md). |

## Basic Usage

```php
echo dropdown('Dropdown', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    'divider',
    ['title' => 'Item'],
    ['custom' => '<b class="p-3">Custom bold text</b>'],
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Link 1</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><span class="dropdown-item-text">Item</span></li>
        <li><b class="p-3">Custom bold text</b></li>
    </ul>
</div>
```

## Dark version

```php
echo dropdown('Dropdown', [
    ['title' => 'Link 1', 'link' => 'darklink1.php'],
    ['title' => 'Item'],
], [
    'dark' => true,
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="darklink1.php">Link 1</a></li>
        <li><span class="dropdown-item-text">Item</span></li>
    </ul>
</div>
```

## With custom button

The dropdown button works with all [button options](button.md).

```php
echo dropdown('Dropdown', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    ['title' => 'Link 2', 'link' => 'link2.php'],
], [
    'class' => 'd-inline-block',
    'button' => [
        'color' => 'success',
        'size' => 'lg',
    ],
]);

echo dropdown('Dropdown button as link', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    ['title' => 'Link 2', 'link' => 'link2.php'],
    ['title' => 'Link 3', 'link' => 'link3.php'],
], [
    'class' => 'd-inline-block',
    'button' => [
        'link' => '#',
        'no_classes' => true,
    ],
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="dropdown d-inline-block">
    <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Link 1</a></li>
        <li><a class="dropdown-item" href="link2.php">Link 2</a></li>
    </ul>
</div>

<div class="dropdown d-inline-block">
    <a href="#" data-bs-toggle="dropdown">Dropdown button as link</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Link 1</a></li>
        <li><a class="dropdown-item" href="link2.php">Link 2</a></li>
        <li><a class="dropdown-item" href="link3.php">Link 3</a></li>
    </ul>
</div>
```
