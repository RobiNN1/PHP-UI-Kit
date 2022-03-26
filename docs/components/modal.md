# modal()

Render modal.

---

modal( string $id, array $content [, array $options ] ) : string

## Parameters

$id (string) (Required) The ID of Modal.

$content (array) (Required) Associative array.

Options for content:

| Name   | Type   | Default | Description     |
|--------|--------|---------|-----------------|
| header | string | ''      | Header content. |
| title  | string | ''      | Modal title     |
| body   | string | ''      | Modal body.     |
| footer | string | ''      | Modal footer.   |

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name         | Type   | Default   | Description                                          |
|--------------|--------|-----------|------------------------------------------------------|
| id           | string | ''        | Wrapper ID.                                          |
| class        | string | ''        | Class for wrapper.                                   |
| attributes   | array  | []        | Array of custom attributes.                          |
| size         | string | 'default' | Modal size. Possible value: default/sm/lg/fullscreen |
| button       | array  | []        | Button options.                                      |
| hide_button  | bool   | false     | Hide trigger button.                                 |
| close_button | bool   | true      | Show close button.                                   |
| always_open  | bool   | false     | Always open.                                         |

## Basic Usage

```php
echo modal('test', [
    'title'  => 'Modal Title',
    'header' => 'Test',
], [
    'button' => [
        'title' => 'Open Modal', // Button title must be specified otherwise always_open will be set to true.
    ],
]);
```

HTML output:

```html
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-test">Open Modal</button>
<div class="modal fade" id="modal-test" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                Test 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
```
