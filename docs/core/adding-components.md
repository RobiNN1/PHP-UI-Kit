# Adding components

Guide on how to add custom components.

---

## Create class

```php
use RobiNN\UiKit\Components\Component;

class ExampleComponent extends Component {
    public function render(): string {
        return '...';
    }
}
```

> Each component must extend the `Component` class
> and must have `render()` method.

## Adding component to UI Kit

The first parameter is the component name used for the property name and auto-generated functions.

```php
$uikit->addComponent('example_component', ExampleComponent::class);
```

## Helper function (Optional)

```php
if (!function_exists('example_component')) {
    function example_component(): string {
        return get_ui()->example_component->render();
    }
}
```

## Usage

After initialization, you can use it as all components.

```php
echo $uikit->example_component->render();
```

Or

```php
echo $uikit->example_component();
```

In template

```twig
{{ example_component() }}
```

## open() & close()

If the class has public `open()` and `close()` methods, these functions are also created.

```php
echo $uikit->example_component_open();
echo $uikit->example_component_close();
```

In template

```twig
{{ example_component_open() }}
{{ example_component_close() }}
```
