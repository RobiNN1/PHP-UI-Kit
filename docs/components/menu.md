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
echo menu('example', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    ['custom' => button('Button')], // Any HTML
    // Dropdown, you can use all dropdown options (e.g. divider) as well
    [
        'title' => 'Dropdown', // Title is required for dropdown button
        ['title' => 'Sub Link 1', 'link' => 'sub_link1.php'],
        ['title' => 'Sub Link 2', 'link' => 'sub_link2.php'],
    ],
    // Items on the right side
    'right' => [
        ['title' => 'Right Link 1', 'link' => 'right1.php'],
        ['title' => 'Right Link 2', 'link' => 'right2.php'],
    ],
]);
```

<span class="html-output">HTML Output</span>

```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-example">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-example">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="link1.php">Link 1</a></li>
                <li class="nav-item"><button type="button" class="btn btn-secondary">Button</button></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a> 
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="sub_link1.php">Sub Link 1</a></li>
                        <li><a class="dropdown-item" href="sub_link2.php">Sub Link 2</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="right1.php">Right Link 1</a></li>
                <li class="nav-item"><a class="nav-link" href="right2.php">Right Link 2</a></li>
            </ul>
        </div>
    </div>
</nav>
```

## Dark version

```php
echo menu('example-dark', [
    ['title' => 'Link 1', 'link' => 'link1.php'],
    'right' => [
        [
            'title' => 'Dropdown',
            ['title' => 'Sub Link 1', 'link' => 'sub_link1.php'],
            ['title' => 'Sub Link 2', 'link' => 'sub_link2.php'],
        ],
        ['title' => 'Right Link 1', 'link' => 'right1.php'],
    ],
], [
    'color' => 'dark',
]);
```

<span class="html-output">HTML Output</span>

```html
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-example-dark">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-example-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="link1.php">Link 1</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="sub_link1.php">Sub Link 1</a></li>
                        <li><a class="dropdown-item" href="sub_link2.php">Sub Link 2</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="right1.php">Right Link 1</a></li>
            </ul>
        </div>
    </div>
</nav>
```

## Brand

```php
echo menu('example-brand', [
    ['title' => 'Item 1', 'link' => 'link1.php'],
    ['title' => 'Item 1', 'link' => 'link1.php'],
], [
    'brand' => ['title' => 'Brand title', 'link' => 'link..'],
]);
```

<span class="html-output">HTML Output</span>

```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="link..">Brand title</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-example-brand">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-example-brand">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="link1.php">Item 1</a></li>
                <li class="nav-item"><a class="nav-link" href="link1.php">Item 1</a></li>
            </ul>
        </div>
    </div>
</nav>
```
