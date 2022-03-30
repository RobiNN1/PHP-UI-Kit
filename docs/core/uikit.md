# UI Kit

Methods that can be used directly from a UI Kit instance.

---

## getInstance()

Get instance and init UI Kit.

Method has 2 parameters, firt one is Config object (optional) and second one instance of ITplEngine (optional).

```php
use RobiNN\UiKit\UiKit;

$uikit = UiKit::getInstance();
```

## getFrameworkOptions()

Get CSS framework options using "dot" notation.

```php
$alert_default = $uikit->getFrameworkOptions('alert.colors.default');
// alert-primary - if is used BS5
```

## setFrameworkOption()

Get CSS framework options using "dot" notation.

```php
$uikit->setFrameworkOption('alert.colors.default', 'blue');
// blue - .blue class for all CSS frameworks

$uikit->setFrameworkOption('alert.colors.default', 'blue', 'bootstrap5');
// blue - .blue class only for BS5
```

## renderTpl()

Render template.

```php
echo $uikit->renderTpl('tpl_name', []);

// Set true on last parameter to enable loading templates from variable
echo $uikit->renderTpl("{{ alert('Test') }}", [], true);
```

## addHtml()

Add HTML code.

```php
$uikit->addHtml('HTML code');
```

## getHtml()

Get HTML code.

```php
$html = $uikit->getHtml();
```

## tplFunctions()

Get custom TPL functions.

This method is for template engines. Allows you to use components in a template.

```php
$functions = $uikit->tplFunctions();
```

## tplFilters()

Get custom TPL filters.

This method is for template engines. Allows you to use custom filters in a template.

```php
$filters = $uikit->tplFilters();
```

## setPath()

Set path with templates.

```php
$uikit->setPath(__DIR__.'/templates');
```

## getComponents()

Get array of components or component object.

```php
$components = $uikit->getComponents();
```

```php
// Pass component name to get its object
$alert = $uikit->getComponents('alert');
echo $alert->render('Test');
```

## addComponent()

Add component.

```php
// The class can optionally extend the Component class to get access to UiKit methods.
class Test {
    // Note, each component must have render method
    public function render(): string {
        return '...';
    }
}

$uikit->addComponent('test', Test::class);

// Then you can use it like all components
echo $uikit->test->render(); // or create helper function for it

// The following examples only works with render() and open/close (test_open(), test_close()) methods

echo $uikit->test(); // Short version

// It will also work in the Twig
// {{ test() }}
```