# tabs()

Create content that can be hidden and activated onclick.

---

tabs( string $id, array $items [, array $options = [] ] ) : string

## Parameters

$id (string) (Required) The ID of Tabs.

$items (array) (Required) Multidimensional array.

Options for each item:

| Name    | Type   | Default | Description                           |
|---------|--------|---------|---------------------------------------|
| title   | string | ''      | Tab title (in navigation). (Required) |
| content | string | ''      | Tab content. (Required)               |
| active  | bool   | false   | To set witch tab will be active.      |

$options (array) (Optional) Additional options.

#### Available options

| Name           | Type   | Default | Description                 |
|----------------|--------|---------|-----------------------------|
| class          | string | ''      | Class for wrapper.          |
| attributes     | array  | []      | Array of custom attributes. |
| nav_item_class | string | ''      | Class for nav item.         |
| tab_item_class | string | ''      | Class for tab item.         |

## Basic Usage

```php
echo tabs('example', [
    ['title' => 'Tab 1', 'content' => 'Content 1'],
    ['title' => 'Tab 2', 'content' => 'Content 2'],
]);
```

<span class="html-output">HTML Output</span>

```html
<div id="tabs-example">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="example-tab1-link" data-bs-toggle="tab" data-bs-target="#example-tab1" type="button" role="tab" aria-controls="example-tab1">Tab 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="example-tab2-link" data-bs-toggle="tab" data-bs-target="#example-tab2" type="button" role="tab" aria-controls="example-tab2">Tab 2</button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="example-tab1" role="tabpanel" aria-labelledby="example-tab1-link">Content 1</div>
        <div class="tab-pane fade" id="example-tab2" role="tabpanel" aria-labelledby="example-tab2-link">Content 2</div>
    </div>
</div>
```
