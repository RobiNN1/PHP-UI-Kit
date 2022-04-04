# PHP UI Kit

UI Kit with support for multiple CSS frameworks.

A set of components that can be used as functions in PHP or directly in your template.

![Visitor Badge](https://visitor-badge.laobi.icu/badge?page_id=RobiNN1.PHP-UI-Kit)

[Documentation](https://uikit.kelcak.com/)

## Installation

```
composer require robinn/uikit
```

## Basic Usage

```php
// Each component returns a string, so it can also be passed to a variable or printed with an echo

add_html('HTML code'); // Use this function when using get_html()
alert('Default');

echo layout(get_html(), [
    'title' => 'Site title',
]);
```

It is also possible to call components in a template:

```php
get_ui()->setPath(__DIR__.'/templates'); // Path to dir with custom templates 
$html = get_ui()->renderTpl('page'); // page.twig in templates/ dir

echo layout($html, [
    'title' => 'Site title',
]);
```

`page.twig`

```twig
HTML code
{{ alert('Default') }}
```

## Requirements

- PHP >= 8.1
