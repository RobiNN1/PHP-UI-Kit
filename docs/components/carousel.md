# carousel()

A slideshow component to slide through multiple elements.

---

carousel( string $id, array $slides [, array $options ] ) : string

## Parameters

$id (string) (Required) Carousel ID.

$slides (array) (Required) Array of items.

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                 |
|------------|--------|---------|-----------------------------|
| class      | string | ''      | Class for wrapper.          |
| attributes | array  | []      | Array of custom attributes. |
| item_class | string | ''      | Class for item.             |
| indicators | bool   | true    | Carousel indicators.        |
| controls   | bool   | true    | Carousel controls buttons.  |

## Basic Usage

```php
echo carousel('example', [
    '<img class="d-block w-100" src="path/to/image1.jpg" alt="Slide 1">',
    '<img class="d-block w-100" src="path/to/image2.jpg" alt="Slide 2">',
    '<img class="d-block w-100" src="path/to/image3.jpg" alt="Slide 3">',
]);
```

<span class="html-output">HTML Output</span>

```html
<div id="carousel-example" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-example" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carousel-example" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carousel-example" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="path/to/image1.jpg" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="path/to/image2.jpg" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="path/to/image3.jpg" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-example" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-example" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
</div>
```

## Slides only

```php
echo carousel('example', [
    '<img class="d-block w-100" src="path/to/image1.jpg" alt="Slide 1">',
    '<img class="d-block w-100" src="path/to/image2.jpg" alt="Slide 2">',
    '<img class="d-block w-100" src="path/to/image3.jpg" alt="Slide 3">',
], [
    'indicators' => false,
    'controls'   => false,
]);
```

<span class="html-output">HTML Output</span>

```html
<div id="carousel-example" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active"><img class="d-block w-100" src="path/to/image1.jpg" alt="Slide 1"></div>
        <div class="carousel-item"><img class="d-block w-100" src="path/to/image2.jpg" alt="Slide 2"></div>
        <div class="carousel-item"><img class="d-block w-100" src="path/to/image3.jpg" alt="Slide 3"></div>
    </div>
</div>
```
