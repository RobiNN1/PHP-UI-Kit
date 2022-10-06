# button()

Show the button where you need, as action button or a link.

---

```php {.function-name}
button( string $title [, string $type = 'button', array $options = [] ] ) : string
```

## Parameters

$title (string) (Required) Button title.

$type (string) (Optional) Button type. Possible value: button|submit|reset

$options (array) (Optional) Additional options.

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

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<button type="button" class="btn btn-secondary">Default</button>
```

## Colors

```php
echo button('Default');

echo button('Primary', 'button', [
    'color' => 'primary',
]);

echo button('Success', 'button', [
    'color' => 'success',
]);

echo button('Warning', 'button', [
    'color' => 'warning',
]);

echo button('Error', 'button', [
    'color' => 'error',
]);

echo button('Info', 'button', [
    'color' => 'info',
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<button type="button" class="btn btn-secondary">Default</button>
<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-danger">Error</button>
<button type="button" class="btn btn-info">Info</button>
```

## Sizes

```php
echo button('Small', 'button', [
    'size' => 'sm',
]);

echo button('Default');

echo button('Large', 'button', [
    'size' => 'lg',
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<button type="button" class="btn btn-secondary btn-sm">Small</button>
<button type="button" class="btn btn-secondary">Default</button>
<button type="button" class="btn btn-secondary btn-lg">Large</button>
```

## As Link

```php
echo button('Link', '', [
    'link' => 'link.php',
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<a href="link.php" class="btn btn-secondary">Link</a>
```

## Active & Disabled State

```php
echo button('Active', '', [
    'active' => true,
]);

echo button('Disabled', '', [
    'disabled' => true,
]);
```

<span class="html-output-title">HTML Output</span>

```html {.html-output}
<button type="button" class="btn btn-secondary active">Active</button>
<button type="button" class="btn btn-secondary disabled" disabled>Disabled</button>
```
