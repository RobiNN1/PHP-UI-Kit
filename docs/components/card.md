# card()

Flexible and extensible content container.

---

card( [ array $options ] ) : string

## Parameters

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                                         |
|------------|--------|---------|-----------------------------------------------------|
| id         | string | ''      | Wrapper ID.                                         |
| class      | string | ''      | Class for wrapper.                                  |
| attributes | array  | []      | Array of custom attributes.                         |
| top_img    | array  | []      | Card top image. Must contains `src` and `alt` keys. |
| header     | string | ''      | Card header.                                        |
| top        | string | ''      | Card top content.                                   |
| body       | string | ''      | Card body.                                          |
| bottom     | string | ''      | Card bottom content.                                |
| footer     | string | ''      | Card footer.                                        |

## Basic Usage

```php
echo card([
    'header' => 'Card header',
    'body'   => 'Card body',
    'footer' => 'Card footer',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="card">
    <div class="card-header">Card header</div>
    <div class="card-body">Card body</div>
    <div class="card-footer">Card footer</div>
</div>
```

## Top Image

```php
echo card([
    'top_img' => ['src' => 'path/to/image.jpg', 'alt' => 'Example image'],
    'body'    => 'Card body',
]);
```

<span class="html-output">HTML Output</span>

```html
<div class="card">
    <img class="card-img-top" src="path/to/image.jpg" alt="Example image">
    <div class="card-body">Card body</div>
</div>
```
