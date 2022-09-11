# UI Kit

Methods that can be used directly from a UI Kit object.

## Constructor

A Constructor has one paramater - $config, that can be an array or Config object.

```php
use RobiNN\UiKit\UiKit;

$uikit = new UiKit();
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

## addPath()

Set path with templates.

https://twig.symfony.com/doc/3.x/api.html#built-in-loaders

```php
$uikit->addPath(__DIR__.'/templates', 'path_namespace');
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

## options()

Set component options.

```php
echo $uikit->alert->render('example')->options([]);
```

## attributes()

Set component attributes.

```php
echo $uikit->alert->render('example')->attributes([]);
```

## toHtml()

Get HTML of a component.

Components return their object, that can be cast to a string (it uses `__toString()` under the hood).
Alternatively, you can call this method to do this.

```php
$uikit->alert->render('example')->toHtml();
```
