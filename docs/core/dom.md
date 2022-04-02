# Dom

Functions for manipulating with attributes.

---

```php
use RobiNN\UiKit\Dom;

$html = '<a href="link.php" class="linkclass">Example</a>';

$dom = new Dom($html);
```

## setAttr()

Add an attribute to the tag.

```php
$dom->setAttr('a', 'id', 'example');

// <a href="link.php" class="linkclass" id="example">Example</a>
```

## removeAttr()

Remove attribute from tag.

```php
$dom->removeAttr('a', 'class');

// <a href="link.php">Example</a>
```

## save()

Save html.

```php
$html = $dom->save(); // Modified dom.
```
