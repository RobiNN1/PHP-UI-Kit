# accordion()

Show hidden information based on the collapse.

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

## Basic Usage

```php
echo accordion('example', [
    'Title 1' => 'Content 1',
    'Title 2' => 'Content 2',
]);
```

HTML output:

```html
<div class="accordion" id="accordion-example">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-example1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-example1" aria-expanded="true" aria-controls="collapse-example1">Title 1</button>
        </h2>
        <div id="collapse-example1" class="accordion-collapse collapse" aria-labelledby="heading-example1" data-bs-parent="#accordion-example">
            <div class="accordion-body">Content 1</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-example2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-example2" aria-expanded="true" aria-controls="collapse-example2">Title 2</button>
        </h2>
        <div id="collapse-example2" class="accordion-collapse collapse" aria-labelledby="heading-example2" data-bs-parent="#accordion-example">
            <div class="accordion-body">Content 2</div>
        </div>
    </div>
</div>
```
