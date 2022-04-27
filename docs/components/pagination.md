# pagination()

Indicate a series of content across various pages.

---

pagination( array $items [, array $options = [] ] ) : string

## Parameters

$items (array) (Required) Array of items.

$options (array) (Optional) Additional options.

#### Available options

| Name       | Type       | Default   | Description                                          |
|------------|------------|-----------|------------------------------------------------------|
| id         | string     | ''        | Wrapper ID.                                          |
| class      | string     | ''        | Class for wrapper.                                   |
| attributes | array      | []        | Array of custom attributes.                          |
| item_class | string     | ''        | Class for item.                                      |
| link       | string     | ''        | Pagination link tpl, use %s placeholder for numbers. |
| current    | int        | 1         | Current active page.                                 |
| disabled   | int\string | 0         | Disabled page. Also, can disable prev and next.      |
| prev_next  | bool       | true      | Enable Previous and Next links.                      |
| prev_title | string     | '&laquo;' | Previous page link title.                            |
| next_title | string     | '&raquo;' | Next page link title.                                |

## Basic Usage

```php
echo pagination([1, 2, 3, 4], [
    'link' => 'page.php?p=%s',
]);
```

<span class="html-output">HTML Output</span>

```html
<ul class="pagination">
    <li class="page-item"><a class="page-link" href="page.php?p=1">&laquo;</a></li>
    <li class="page-item active"><a class="page-link" href="page.php?p=1">1</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=2">2</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=3">3</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=4">4</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=2">&raquo;</a></li>
</ul>
```
