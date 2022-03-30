# menu()

Show a navigational bar at the top side of your website.

---

menu( string $id, array $items [, array $options ] ) : string

## Parameters

$id (string) (Required) The ID of Menu.

$items (array) (Required) Multidimensional array.

Options for each item:

| Name   | Type   | Default | Description                                                                  |
|--------|--------|---------|------------------------------------------------------------------------------|
| title  | string | ''      | Item title                                                                   |
| link   | string | ''      | Item link.                                                                   |
| class  | string | ''      | Item class.                                                                  |
| custom | string | ''      | Custom HTML in item. If this option is specified, other options are ignored. |

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default                        | Description                            |
|------------|--------|--------------------------------|----------------------------------------|
| id         | string | ''                             | Wrapper ID.                            |
| class      | string | ''                             | Class for wrapper.                     |
| attributes | array  | []                             | Array of custom attributes.            |
| item_class | string | ''                             | Class for item.                        |
| color      | string | 'light'                        | Menu color. Possible value: light/dark |
| brand      | array  | ['title' => '', 'link' => '#'] | Site name.                             |

## Basic Usage

```php
echo menu('test', [
    ['title' => 'Item 1', 'link' => 'link1.php'],
    ['custom' => button('Button')],
    // Dropdown
    [
        'title' => 'Dropdown', // Title is required for dropdown button
        ['title' => 'Sub Item 1', 'link' => 'sub_link1.php'],
        ['title' => 'Sub Item 2', 'link' => 'sub_link2.php'],
    ],
    // Items on right side
    'right' => [
        ['title' => 'Right 1', 'link' => 'right1.php'],
    ],
]);
```

HTML output:

```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartest"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbartest">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="link1.php">Item 1</a></li>
                <li class="nav-item"><button type="button" class="btn btn-secondary">Button</button></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a> 
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="sub_link1.php">Sub Item 1</a></li>
                        <li><a class="dropdown-item" href="sub_link2.php">Sub Item 2</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="right1.php">Right 1</a></li>
            </ul>
        </div>
    </div>
</nav>
```
