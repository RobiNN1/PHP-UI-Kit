# Add to

Functions for adding content to the output.

---

## head()

Append content to head.

```php
RobiNN\UiKit\AddTo::head('<meta ...>');
```

Is also possible to set order by setting `before` or `after` as second argument (`after` is default).

`before` - these tags will be added first.

`after` - these tags will be added after tags with `before` set.

In this example, main.css will be loaded first and custom.css will be loaded second.
If the order is not specified, it will be loaded as it's called, custom.css first and main.css second.

```php
RobiNN\UiKit\AddTo::head('<link href="custom.css" rel="stylesheet">', 'after');
RobiNN\UiKit\AddTo::head('<link href="main.css" rel="stylesheet">', 'before');
```

## footer()

Append content to footer.

Is also possible to set order by setting `before` or`after` as second argument (`after` is default).

`before` - these tags will be added first.

`after` - these tags will be added after tags with `before` set.

```php
RobiNN\UiKit\AddTo::footer('<script>...</script>');
```

## js()

Add JS code to the output. It's loaded in the footer.

```php
RobiNN\UiKit\AddTo::js('let uikit = "";');
```

## css()

Add CSS code to the output.

```php
RobiNN\UiKit\AddTo::css('body { color: #000; }');
```

## getHeadTags()

Get all head tags.

If you have a custom layout, load this method to get UI Kit tags.

```php
$head_tags = RobiNN\UiKit\AddTo::getHeadTags();
```

## getFooterTags()

Get all footer tags.

If you have a custom layout, load this method to get UI Kit tags.

```php
$footer_tags = RobiNN\UiKit\AddTo::getFooterTags();
```
