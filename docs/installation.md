# Installation

## Getting Started

Install the package by running

```
composer require robinn/uikit
```

## Usage

Components can be loaded in several ways, it's up to you what you choose.

Here are recommended ways

##### Get HTML

Each component returns a string, so it can also be passed to a variable or printed with an echo.

Note: any text or html must be added via `add_html()`

```php
add_html('HTML code'); // Use this function when using get_html()
alert('Default');

echo layout(get_html(), [
    'title' => 'Site title',
]);
```

##### Echo

Simply print everything with echo.

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

##### In template

It is also possible to call components in a template.

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

## Config

The simplest way to change config is to override `get_ui()` function (if you use components with helper functions).

Simply place this function after class autoload.

```php
function get_ui(): RobiNN\UiKit\UiKit {
    $config = new RobiNN\UiKit\Config([
        'cache'  => __DIR__.'/cache',
    ]);

    return RobiNN\UiKit\UiKit::getInstance()->init($config);
}
```

All options can be found [here](core/config.md).

## Requirements

- PHP 8.1 or higher
