# accordion()

Render accordion.

---

accordion( string $id, array $items [, array $options ] ) : string

## Parameters

$id (string) (Required) Accordion ID.

$items (array) (Required) Associative array nav-title => content.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                  |
|------------|--------|---------|------------------------------|
| class      | string | ''      | Class for wrapper.           |
| attributes | array  | []      | Array of custom attributes.  |
| item_class | string | ''      | Class for item.              |
| first_open | bool   | false   | Set true to open first item. |

## Return Values

(string)

## Basic Usage

```php
echo accordion('test', [
    'Title 1' => 'Content 1',
    'Title 2' => 'Content 2',
]);
```

Output

```html
<div class="accordion" id="accordion-test">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-test1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-test1" aria-expanded="true" aria-controls="collapse-test1">Title 1</button>
        </h2>
        <div id="collapse-test1" class="accordion-collapse collapse" aria-labelledby="heading-test1" data-bs-parent="#accordion-test">
            <div class="accordion-body">Content 1</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-test2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-test2" aria-expanded="true" aria-controls="collapse-test2">Title 2</button>
        </h2>
        <div id="collapse-test2" class="accordion-collapse collapse" aria-labelledby="heading-test2" data-bs-parent="#accordion-test">
            <div class="accordion-body">Content 2</div>
        </div>
    </div>
</div>
```
