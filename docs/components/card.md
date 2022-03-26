# card()

Render card.

---

card( [ array $options ] ) : string

## Parameters

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| id         | string | ''      | Wrapper ID.                 |
| class      | string | ''      | Class for wrapper.          |
| attributes | array  | []      | Array of custom attributes. |
| top_img    | string | ''      | Card top image.             |
| header     | string | ''      | Card header.                |
| top        | string | ''      | Card top content.           |
| body       | string | ''      | Card body.                  |
| bottom     | string | ''      | Card bottom content.        |
| footer     | string | ''      | Card footer.                |

## Basic Usage

```php
echo card([
    'header' => 'Header',
    'body'   => 'Body',
])
```

HTML output:

```html
<div class="card">
    <div class="card-header">Header</div>
    <div class="card-body">Body</div>
</div>
```
