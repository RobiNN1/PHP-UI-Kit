# PHP UI Kit

A toolkit for developing universal web interfaces with support for multiple CSS frameworks.

![Visitor Badge](https://visitor-badge.laobi.icu/badge?page_id=RobiNN1.PHP-UI-Kit)

[Documentation](https://uikit.kelcak.com/)

## Installation

```
composer require robinn/uikit
```

## Basic Usage

Simply print everything with echo.

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
    ->setPath(__DIR__.'/templates') // Path to dir with custom templates
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

## Requirements

- PHP >= 8.1

## Testing

```
composer test
```
