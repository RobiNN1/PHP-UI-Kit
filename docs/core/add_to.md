# Add to

Functions for adding content to the output.

---

## head()

Append content to head.

```php
use RobiNN\UiKit\AddTo;

AddTo::head('<meta ...>');
```

## footer()

Append content to footer.

```php
use RobiNN\UiKit\AddTo;

AddTo::footer('<script>...</script>');
```

## js()

Add JS codes to the output.

```php
use RobiNN\UiKit\AddTo;

AddTo::js('...');
```

## jQuery()

Add jQuery codes to the output.

```php
use RobiNN\UiKit\AddTo;

AddTo::jQuery('...');
```

> This only works if the css framework has enabled jQuery in the configuration file.

## css()

Add CSS codes to the output.

```php
use RobiNN\UiKit\AddTo;

AddTo::css('body { color: #000; }');
```
