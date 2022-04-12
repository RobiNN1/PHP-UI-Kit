# UI Kit

Methods that can be used directly from a UI Kit instance.

---

## getInstance()

Get instance.

```php
use RobiNN\UiKit\UiKit;

$uikit = UiKit::getInstance();
```

## init()

Init UI Kit.

Method has 2 parameters, firt one is Config object (optional) and
second one instance of ITplEngine (optional).

```php
$uikit->init();
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
echo $uikit->renderTpl("{{ alert('Example') }}", [], true);
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

## setPath()

Set path with templates.

```php
$uikit->setPath(__DIR__.'/templates');
```

## addComponent()

Add component.

```php
// The class can optionally extend the Component class to get access to UiKit methods.
class ExampleComponent {
    // Note, each component must have render method
    public function render(): string {
        return '...';
    }
}

$uikit->addComponent('example_component', ExampleComponent::class);

// Then you can use it like all components
echo $uikit->example_component->render(); // or create helper function for it

// The following examples only works with render() and open/close
// (example_component_open(), example_component_close()) methods

echo $uikit->example_component(); // Short version

// It will also work in the Twig
// {{ example_component() }}
```
