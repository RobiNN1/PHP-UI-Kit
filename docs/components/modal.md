# modal()

Show interactive dialogs and notifications or any content.

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
echo modal('example', [
    'title'  => 'Modal title',
    'body'   => 'Modal body',
    'footer' => button('Close', 'button', ['attributes' => ['data-bs-dismiss' => 'modal',]]).
                button('Save', 'button', ['color' => 'success']),
], [
    'button' => [
        'title' => 'Open Modal',
    ],
]);
```

HTML output:

```html
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-example">Open Modal</button>
<div class="modal fade" id="modal-example" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Modal body</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
```
