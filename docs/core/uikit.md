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

The method has 2 parameters, first one is a Config object (optional) and
the second one instance of ITplEngine (optional).

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

Set CSS framework options using "dot" notation.

```php
$uikit->setFrameworkOption('alert.colors.default', 'blue');
// blue - .blue class for all CSS frameworks

$uikit->setFrameworkOption('alert.colors.default', 'blue', 'bootstrap5');
// blue - .blue class only for BS5
```

## render()

Render template.

```php
echo $uikit->render('tpl_name', []);

// Set true on the last parameter to enable loading templates from variable
echo $uikit->render("{{ alert('Example') }}", [], true);
```

## setPath()

Set path with templates.

```php
$uikit->setPath(__DIR__.'/templates');
```

## getComponent()

Get component's object.

```php
$alert = $uikit->getComponent('alert');
```

## addComponent()

Register new component.

```php
$uikit->addComponent('example_component', ExampleComponent::class);
```

> More detailed into can be found [here](adding-components.md).

## get_ui()

Get a UI Kit object.

This helper function can be used to easily access a UI Kit object and after overriding can set in it custom config.
By default, this function uses default config.

Example, access to a config object:

```php
$fw = get_ui()->config->getFramework();
```
