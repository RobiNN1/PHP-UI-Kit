# accordion()

Show hidden information based on the collapse.

---

accordion( string $id, array $items [, array $options ] ) : string

## Parameters

$id (string) (Required) Accordion ID.

$items (array) (Required) Associative array `nav-title => content`.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                    |
|------------|--------|---------|--------------------------------|
| class      | string | ''      | Class for wrapper.             |
| attributes | array  | []      | Array of custom attributes.    |
| item_class | string | ''      | Class for item.                |
| first_open | bool   | true    | Set false to close first item. |

## Basic Usage

```php
echo accordion('example', [
    'Accordion Item #1' => '<strong>This is the first item\'s accordion body.</strong>',
    'Accordion Item #2' => '<strong>This is the second item\'s accordion body.</strong>',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="accordion" id="accordion-example">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-example1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-example1" aria-expanded="true" aria-controls="collapse-example1">Accordion Item #1</button>
        </h2>
        <div id="collapse-example1" class="accordion-collapse collapse show" aria-labelledby="heading-example1" data-bs-parent="#accordion-example">
            <div class="accordion-body"><strong>This is the first item's accordion body.</strong></div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-example2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-example2" aria-expanded="true" aria-controls="collapse-example2">Accordion Item #2</button>
        </h2>
        <div id="collapse-example2" class="accordion-collapse collapse" aria-labelledby="heading-example2" data-bs-parent="#accordion-example">
            <div class="accordion-body"><strong>This is the second item's accordion body.</strong></div>
        </div>
    </div>
</div>
```
