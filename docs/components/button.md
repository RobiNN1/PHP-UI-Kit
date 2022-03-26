# button()

Render button.

---

button( string $title [, string $type, array $options ] ) : string

## Parameters

$title (string) (Required) Button title.

$type (string) (Optional) Button type. Possible value: button|submit|reset Default value: 'button'

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type       | Default   | Description                                                              |
|------------|------------|-----------|--------------------------------------------------------------------------|
| id         | string     | ''        | Button ID.                                                               |
| class      | string     | ''        | Button class.                                                            |
| attributes | array      | []        | Array of custom attributes.                                              |
| name       | string     | ''        | Value of name attribute.                                                 |
| value      | string/int | ''        | Value of value attribute.                                                |
| color      | string     | 'default' | Button color. Possible value: default/primary/success/warning/error/info |
| size       | string     | 'default' | Button size. Possible value: default/sm/lg                               |
| active     | bool       | false     | Active state.                                                            |
| disabled   | bool       | false     | Disabled state.                                                          |
| link       | string     | ''        | Button link.                                                             |
| icon       | string     | ''        | Button icon.                                                             |
| icon_right | bool       | false     | Show the icon on the right.                                              |
| no_classes | bool       | false     | Set true to remove default classes.                                      |

## Basic Usage

```php
echo button('Default');
```

HTML output:

```html
<button type="button" class="btn btn-secondary">Default</button>
```

**As a link**

```php
echo button('Link', '', ['link' => 'link.php']);
```

HTML output:

```html
<a href="link.php" class="btn btn-secondary">Link</a>
```
