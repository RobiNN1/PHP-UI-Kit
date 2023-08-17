# Adding components

Guide on how to add custom components.

---

Each component must extend the `Component` class.

## Example 1

A simple component that directly prints content.

```php
use RobiNN\UiKit\Components\Component;

class ExampleComponent extends Component {
    public function render(): string {
        return '...';
    }
}
```

## Example 2

Component with a template.

```php
use RobiNN\UiKit\Components\Component;

class ExampleComponent extends Component {
    protected string $component = '@namespace/example_component';

    public function render(string $param): Component {
        $this->uikit->addPath(__DIR__.'/path/to/tpls', 'namespace');

        return $this->setTplData([
            'param' => $param,
        ]);
    }
}
```

## Adding component to UI Kit

The first parameter is the component name used for the property name and auto-generated functions.

```php
$uikit->addComponent('example_component', ExampleComponent::class);
```

## Helper function (Optional)

```php
if (!function_exists('example_component')) {
    function example_component() {
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

Create string from the given array of attributes.

```php
$this->getAttributes([
    'disabled' => null,
    'value'    => 'test',
]);

// disabled value="test"
```

### getOption()

Get the correct value from framework options.

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

### setTplData()

Set template data.

The component's options are automatically transferred to the template,
but these data can be modified with this method if needed.
As well as can add additional data, e.g. values from parameters.

```php
$this->setTplData([]);
```
