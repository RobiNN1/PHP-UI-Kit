# PHP UI Kit

A toolkit for developing universal web interfaces with support for multiple CSS frameworks.

![Visitor Badge](https://visitor-badge.laobi.icu/badge?page_id=RobiNN1.PHP-UI-Kit)

[Documentation](https://uikit.kelcak.com/)

## Use cases

One of the use cases is the use in CMS.

For example, you create a settings page, and you want the page to look good with any css framework.
So you create a template that the theme creator can copy into the theme and modify as needed,
which is not a great solution because this template can be changed at any time,
meaning that any theme that includes this template has to update it as well.

This UI Kit solves this annoyance. How? Just create a settings page with this kit.

Based on your implementation of this kit in your cms, the theme creator sets the css
framework he wants and the settings page automatically adapts its html.
So the theme creator doesn't have to worry about core templates and can focus on theme development.

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

> Note: no need to use `layout()`, you can use own logic as well.

## Requirements

- PHP >= 8.1

## Testing

PHPUnit

```
composer test
```

PHPStan

```
composer phpstan
```
