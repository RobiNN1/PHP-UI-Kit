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
echo carousel('test', [
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">First slide</text>
    </svg>',
    '<svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555">Second slide</text>
    </svg>',
]);
```

HTML output:

```html
<div id="carousel-test" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-test" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carousel-test" data-bs-slide-to="1"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
                <rect width="100%" height="100%" fill="#777"></rect>
                <text x="50%" y="50%" fill="#555">First slide</text>
            </svg>
        </div>
        <div class="carousel-item">
            <svg style="width:100%;height:300px;" xmlns="http://www.w3.org/2000/svg">
                <rect width="100%" height="100%" fill="#777"></rect>
                <text x="50%" y="50%" fill="#555">Second slide</text>
            </svg>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-test" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-test" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
</div>
```
