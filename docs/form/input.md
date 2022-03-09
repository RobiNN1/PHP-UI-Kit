# input()

Render input field.

---

input( string $name [, string $label, mixed $value, array $options ] ) : string

## Parameters

$name (string) (Required) Input name.

$label (string) (Optional) Input label. Default value: ''

$value (string|int) (Optional) Input value. Default value: ''

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name             | Type   | Default   | Description                                                                            |
|------------------|--------|-----------|----------------------------------------------------------------------------------------|
| id               | string | ''        | Wrapper ID.                                                                            |
| class            | string | ''        | Class for wrapper.                                                                     |
| attributes       | array  | []        | Array of custom attributes.                                                            |
| input_id         | string | $name     | Input ID.                                                                              |
| input_class      | string | ''        | Input class.                                                                           |
| input_attributes | array  | []        | Array of custom attributes for input.                                                  |
| placeholder      | string | ''        | Placeholder.                                                                           |
| type             | string | 'text'    | Input type.                                                                            |
| size             | string | 'default' | Input size. Possible value: default/sm/lg                                              |
| state            | string | ''        | Validation state. Possible value: success/error                                        |
| feedback_text    | string | ''        | Custom feedback text. In your code do validation and then set state and feedback text. |
| required         | bool   | false     | Required.                                                                              |
| help_text        | string | ''        | Custom help text.                                                                      |
| left_addon       | string | ''        | Left addon.                                                                            |
| right_addon      | string | ''        | Right addon.                                                                           |
| left_custom      | string | ''        | Left custom addon.                                                                     |
| right_custom     | string | ''        | Right custom addon.                                                                    |

## Return Values

(string)

## Basic Usage

```php
echo input('test', 'Test input');
```

Output

```html
<div class="mb-1">
    <label for="test" class="form-label">Test input</label>
    <input value="" type="text" id="test" name="test" class="form-control">
</div>
```

**With left addon**

```php
echo input('username', 'Username', '', ['left_addon' => '@']);
```

Output

```html
<div class="mb-1">
    <label for="username" class="form-label">Username</label>
    <div class="input-group">
        <span class="input-group-text">@</span>
        <input value="" type="text" id="username" name="username" class="form-control">
    </div>
</div>
```

**With action button**

```php
echo input('search-input', '', '', [
    'placeholder'  => 'Search...',
    'right_custom' => button('Search'),
]);
```

Output

```html
<div class="mb-1">
    <div class="input-group">
        <input value="" type="text" id="search-input" name="search-input" placeholder="Search..." class="form-control">
        <button type="button" class="btn btn-secondary">Search</button>
    </div>
</div>
```
