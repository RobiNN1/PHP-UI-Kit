# Installation

## Getting Started

Install the package by running

```bash
composer require robinn/uikit
```

## Usage

Components can be loaded in several ways. It's up to you what you choose.

Here are recommended ways

#### Echo

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

#### In template

It is also possible to call components in a template.

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

## Config

If you use components with helper functions, the simplest way to change config is to override `get_ui()` function.

Simply place this function after class autoload.

```php
function get_ui(): RobiNN\UiKit\UiKit {
    $config = new RobiNN\UiKit\Config([
        'cache'  => __DIR__.'/cache',
    ]);

    return new RobiNN\UiKit\UiKit($config);
}
```

All options can be found [here](core/config.md).

> [`layout()`](layout/layout.md) is not required and
> components can be used in any project that uses a compatible CSS framework.
> However, if the [`layout()`](layout/layout.md) is not used, [Get HTML](#get-html) may not work.

## Requirements

- PHP 8.1 or higher
