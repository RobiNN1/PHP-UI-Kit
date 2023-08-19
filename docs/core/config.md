# Config

An overview of all configuration options.

---

```php
$config = new RobiNN\UiKit\Config(); // All options can also be set in the constructor
```

#### Available options

| Name           | Type   | Default                               |
|----------------|--------|---------------------------------------|
| cache          | mixed  | false                                 |
| debug          | bool   | false                                 |
| framework      | string | 'bootstrap5'                          |
| framework_path | array  | Associative array - framework => path |

## getCache()

Returns an absolute path, a `Twig\Cache\CacheInterface` implementation, or false.

```php
$tpl_config = [
    'cache' => $config->getCache(),
];
```

## setCache()

Set an absolute path, a `Twig\Cache\CacheInterface` implementation, or false.

```php
$config->setCache(__DIR__.'/path/to/cache');
```

## getDebug()

Get debug option.

```php
$tpl_config = [
    'debug' => $config->getDebug(),
];
```

## enableDebug()

TPL engine debugging.

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

Get a path of the currently loaded framework.

```php
$fw_path = $config->getFrameworkPath($framework);
```

## setFrameworkPath()

Set the path to the framework.

```php
$config->setFrameworkPath('bootstrap5', __DIR__.'/path/to/bootstrap5');
```
