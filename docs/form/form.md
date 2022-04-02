# form()

Show `<form>` tag.

---

form_open( [ string $method, string $action, array $options ] ) : string

## Parameters

$method (string) (Optional) Form method. Possible value: get|post Default value: 'post'

$action (string) (Optional) Form action. Default value: ''

$options (array) (Optional) Additional options. Default value: []

#### Available options

| Name       | Type   | Default | Description                                      |
|------------|--------|---------|--------------------------------------------------|
| id         | string | ''      | Form ID.                                         |
| class      | string | ''      | Class for wrapper.                               |
| attributes | array  | []      | Array of custom attributes.                      |
| name       | string | ''      | Name attribute.                                  |
| upload     | bool   | false   | Set true for adding enctype multipart/form-data. |

## Basic Usage

```php
echo form_open();
// ...
echo form_close();
```

HTML output:

```xhtml
<form method="post">
</form>
```
