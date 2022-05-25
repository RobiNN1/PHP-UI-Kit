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

$body = ob_get_clean();
echo layout($body, [
    'title' => 'Site title',
]);
```

It is also possible to call components in a template:

```php
get_ui()->setPath(__DIR__.'/templates'); // Path to dir with custom templates 
$html = get_ui()->render('page'); // page.twig in templates/ dir

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
