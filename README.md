# PHP UI Kit

UI Kit with support for multiple CSS frameworks.

A set of components that can be used as functions in PHP or directly in your template.

![Visitor Badge](https://visitor-badge.laobi.icu/badge?page_id=RobiNN1.PHP-UI-Kit)

[Documentation](docs)

## Installation

```
composer require robinn/uikit
```

## Basic Usage

The easiest way is to use it with helper functions

```php
ob_start();

echo 'HTML code';
echo alert('Default');

$body = ob_get_contents();
ob_end_clean();
echo layout($body, [
    'title' => 'Site title',
]);
```

Or if you don't like echo

```php
add_html('HTML code');
alert('Default');

echo layout(get_html(), [
    'title' => 'Site title',
]);
```

It is also possible to write everything directly in Twig

```php
// This is all you need in PHP
get_ui()->setPath(__DIR__.'/templates/'); // Path to dir with custom templates 
echo get_ui()->renderTpl('page'); // page.twig in templates/ dir
```

`page.twig`

```twig
{% macro page() %}
    HTML code
    {{ alert('Default') }}
{% endmacro %}

{{ layout(_self.page(), {'title': 'Site title'}) }}
```

## Requirements

- PHP >= 8.1
