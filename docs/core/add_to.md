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

## css()

Add CSS codes to the output.

```php
use RobiNN\UiKit\AddTo;

AddTo::css('body { color: #000; }');
```
