# Config

An overview of all configuration options.

---

```php
use RobiNN\UiKit\Config;

$config = new Config([]); // All options can be set in constructor as well
```

#### Available options

| Name           | Type   | Default                               |
|----------------|--------|---------------------------------------|
| cache          | mixed  | false                                 |
| debug          | bool   | false                                 |
| framework      | string | 'bootstrap5'                          |
| framework_path | array  | Associative array - framework => path |

## getCache()

Returns cache object (depends on tpl engine), absolute path or false.

```php
$tpl_config = [
    'cache' => $config->getCache(),
];
```

## setCache()

Set cache object (depends on tpl engine), absolute path or false.

```php
$config->setCache(__DIR__.'/path/to/cache')
```

## getDebug()

Get debug option.

```php
$tpl_config = [
    'debug' => $config->getDebug(),
];
```

## enableDebug()

TPL engine debugging (if supported by engine).

```php
$config->enableDebug();
```

## getFramework()

Get the currently loaded framework.

```php
$framework = $config->getFramework();
```

## setFramework()

Set the framework.

```php
$config->setFramework('bootstrap5');
```

## getFrameworkPath()

Get path of the currently loaded framework.

```php
$fw_path = $config->getFrameworkPath($framework);
```

## setFrameworkPath()

Set path to the framework.

```php
$config->setFrameworkPath('bootstrap5', __DIR__.'/path/to/bootstrap5');
```
