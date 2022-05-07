# Installation

## Getting Started

Install the package by running

```bash
composer require robinn/uikit
```

## Usage

Components can be loaded in several ways. It's up to you what you choose.

Here are recommended ways

##### Echo

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

##### Get HTML

Each component returns a string, so it can also be passed to a variable or printed with an echo.

```php
add_html('HTML code'); // Use this function when using get_html()
alert('Default');

echo layout(get_html(), [
    'title' => 'Site title',
]);
```

> Any text or HTML must be added via `add_html()` when useing `get_html()`.


##### In template

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
    
    $uikit = RobiNN\UiKit\UiKit::getInstance();

    return $uikit->init($config);
}
```

All options can be found [here](core/config.md).

> [`layout()`](layout/layout.md) is not required and 
> components can be used in any project that uses a compatible CSS framework.
> However, if the [`layout()`](layout/layout.md) is not used, [Get HTML](#get-html) may not work.

## Requirements

- PHP 8.1 or higher
