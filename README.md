# PHP UI Kit

A toolkit for developing universal web interfaces with support for multiple CSS frameworks.

![Visitor Badge](https://visitor-badge.laobi.icu/badge?page_id=RobiNN1.PHP-UI-Kit)

## Installation

```
composer require robinn/uikit
```

## Basic Usage

Print everything with echo.

```php
ob_start();

echo 'HTML code';
echo alert('Default');

echo layout(ob_get_clean(), [
    'title' => 'Site title',
]);
```

It is also possible to call components in a template:

```php
$html = get_ui()
    ->addPath(__DIR__.'/templates') // Path to dir with custom templates
    ->render('page'); // page.twig in templates/ dir

echo layout($html, [
    'title' => 'Site title',
]);
```

`page.twig`

```twig
HTML code
{{ alert('Default') }}
```

There are multiple syntaxes available. It's up to you which one you choose.

> Note: no need to use `layout()`, you can use your own logic as well.

## Requirements

- PHP >= 8.2
