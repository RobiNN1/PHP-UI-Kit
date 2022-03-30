# tabs()

Create content that can be hidden and activated onclick.

---

tabs( string $id, array $items [, array $options ] ) : string

## Parameters

$id (string) (Required) The ID of Tabs.

$items (array) (Required) Multidimensional array.

Options for each item:

| Name    | Type   | Default | Description                           |
|---------|--------|---------|---------------------------------------|
| title   | string | ''      | Tab title (in navigation). (Required) |
| content | string | ''      | Tab content. (Required)               |
| active  | bool   | false   | To set witch tab will be active.      |

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name           | Type   | Default | Description                 |
|----------------|--------|---------|-----------------------------|
| class          | string | ''      | Class for wrapper.          |
| attributes     | array  | []      | Array of custom attributes. |
| nav_item_class | string | ''      | Class for nav item.         |
| tab_item_class | string | ''      | Class for tab item.         |

## Basic Usage

```php
echo tabs('test', [
    ['title' => 'Tab 1', 'content' => 'Content 1'],
    ['title' => 'Tab 2', 'content' => 'Content 2'],
]);
```

HTML output:

```html
<div id="tabs-test">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="test-tab1-link" data-bs-toggle="tab" data-bs-target="#test-tab1" type="button" role="tab" aria-controls="test-tab1">Tab 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="test-tab2-link" data-bs-toggle="tab" data-bs-target="#test-tab2" type="button" role="tab" aria-controls="test-tab2">Tab 2</button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="test-tab1" role="tabpanel" aria-labelledby="test-tab1-link">Content 1</div>
        <div class="tab-pane fade" id="test-tab2" role="tabpanel" aria-labelledby="test-tab2-link">Content 2</div>
    </div>
</div>
```
