# PHP UI Kit

A toolkit for developing universal web interfaces with support for multiple CSS frameworks.

![Visitor Badge](https://visitor-badge.laobi.icu/badge?page_id=RobiNN1.PHP-UI-Kit)

[Documentation](https://uikit.kelcak.com/)

## Use cases

This UI Kit comes into play in CMS, among other scenarios.

Take, for instance, the making of a settings page.
The goal is to have this page seamlessly blend with any CSS framework.
The typical approach involves creating a modifiable template which theme
designers can incorporate into their themes.
However, this solution is far from optimal since changes to the template
require updates across all themes using it.

This is where our UI Kit excels. It allows you to construct a settings page directly using the kit.

Depending on how you've applied this kit within your project, the theme designer can select the desired CSS framework,
and the settings page automatically adjusts its HTML code.
Thus, the focus of the theme creator remains solely
on theme development, without the need to maintain core templates.

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

- PHP >= 8.2

## Testing

PHPUnit

```
composer test
```

PHPStan

```
composer phpstan
```
