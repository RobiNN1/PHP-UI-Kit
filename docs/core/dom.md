# Dom

Functions for manipulating with attributes.

---

```php
use RobiNN\UiKit\Dom;

$html = '<a href="link.php" class="test-link">Test</a>';

$dom = new Dom($html);
```

## setAttr()

Add an attribute to the tag.

```php
$dom->setAttr('a', 'id', 'test');

// <a href="link.php" class="test-link" id="test">Test</a>
```

## removeAttr()

Remove attribute from tag.

```php
$dom->removeAttr('a', 'class');

// <a href="link.php">Test</a>
```

## save()

Save html.

```php
$html = $dom->save(); // Modified dom.
```
