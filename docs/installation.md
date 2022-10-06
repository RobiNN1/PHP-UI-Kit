# Installation

Installation and usage guide.

---

## Getting Started

Install the package by running

```bash
composer require robinn/uikit
```

## Usage

Initialize UI Kit and then call methods or simply use `get_ui()` helper function.

Components can be loaded in several ways. It's up to you what you choose.

```php
use RobiNN\UiKit\UiKit;

$uikit = new UiKit();

ob_start();

// ...

$uikit->layout(ob_get_clean());
```

> `$uikit->` can be replaced by `get_ui()->` function, or simply use for everything helper functions.
> 
> Note: when using `get_ui()` and you want custom config, you have to redeclare this function.

#### Echo

Simply print everything with echo.

```php
ob_start();

echo 'HTML code';
echo alert('Default');

echo layout(ob_get_clean(), [
    'title' => 'Site title',
]);
```

#### In template

It is also possible to call components in a template.

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

## Config

If you use components with helper functions, the simplest way to change config is to override `get_ui()` function.

Simply place this function after class autoload.

```php
function get_ui(): RobiNN\UiKit\UiKit {
    return new RobiNN\UiKit\UiKit([
        'cache'  => __DIR__.'/cache',
    ]);
}
```

All options can be found [here](core/config.md).

> [`layout()`](layout/layout.md) is not required and
> components can be used in any project that uses a compatible CSS framework.

## Requirements

- PHP 7.4 or higher
