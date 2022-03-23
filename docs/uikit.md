# UI Kit

Methods that can be used directly from a UiKit instance.

---

## getInstance()

Get instance and init UI Kit.

Method has 2 parameters, firt one is Config object (optional) and second one instance of ITplEngine (optional).

```php
use RobiNN\UiKit\UiKit;

$uikit = UiKit::getInstance();
```

## getFramework()

Get name of currently loaded CSS framework.

```php
$framework = $uikit->getFramework();
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
echo $uikit->renderTpl('tpl_name', [...]);
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
