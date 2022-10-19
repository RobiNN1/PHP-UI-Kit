# Adding components

Guide on how to add custom components.

---

## Create class

```php
use RobiNN\UiKit\Components\Component;

final class ExampleComponent extends Component {
    public function render(): string {
        return '...';
    }
}
```

> Each component must extend the `Component` class and must have `render()` method.

## Adding component to UI Kit

The first parameter is the component name used for the property name and auto-generated functions.

```php
$uikit->addComponent('example_component', ExampleComponent::class);
```

## Helper function (Optional)

```php
if (!function_exists('example_component')) {
    function example_component(): string {
        return get_ui()->example_component();
    }
}
```

## Usage

After initialization, you can use it as all components.

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

## Available methods

By extending `Component` class, your code has access to the `$this->uikit` and these methods

### getAttributes()

Create string from the given array.

```php
$this->getAttributes([
    'disabled' => null,
    'value'    => 'test',
]);

// disabled value="test"
```

### getOption()

Get correct value from framework options.

```php
// E.g. alert component
// 'alert' => [
//     'colors' => [
//         'default' => 'alert-primary',
//         'success' => 'alert-success',
//         ...
//     ],
// ],
$this->getOption('colors', 'success');

// alert-success
```

> Thanks to `protected string $component = 'components/alert';`
> method automatically chooses an option from alert's config.
> However, it is possible to explicitly set component name.

```php
$this->getOption('colors', 'success', 'alert');
```

### tpl()

Render template.

Method also sets `attributes` option to the template engine.

```php
$this->tpl([]);
```

> The method requires that the `protected string $component = '';` be set.

### tplData()

Set template data.

```php
$this->tplData([]);
```
