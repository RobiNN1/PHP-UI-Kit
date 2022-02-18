<?php
/**
 * Helper functions.
 * For easy access to all features, copy this file into your project.
 *
 * @author RobiNN
 */

/**
 * Return UI Kit instance.
 * You can change the options if necessary.
 *
 * @return RobiNN\UiKit\UiKit
 */
function get_ui(): RobiNN\UiKit\UiKit {
    $config = new RobiNN\UiKit\Config([
        'cache'     => __DIR__.'/cache', // Cache object (depends on tpl engine), absolute path or false.
        // 'framework'    => 'bootstrap5' // CSS Framework. Possible value: bootstrap5|semanticui2
        'framework' => isset($_GET['sm']) ? 'semanticui2' : 'bootstrap5', // for development purposes
    ]);

    return RobiNN\UiKit\UiKit::getInstance($config, true);
}

/**
 * Usage:
 * echo layout('Body content');
 *
 * @param string $body
 * @param array  $options
 *
 * @return string
 */
function layout(string $body, array $options = []): string {
    return get_ui()->layout->render($body, $options);
}

/**
 * Usage:
 * echo opencontainer();
 *
 * @param bool  $fluid
 * @param array $options
 *
 * @return string
 */
function opencontainer(bool $fluid = false, array $options = []): string {
    return get_ui()->container->open($fluid, $options);
}

/**
 * Usage:
 * echo closecontainer();
 *
 * @return string
 */
function closecontainer(): string {
    return get_ui()->container->close();
}

/**
 * Usage:
 * echo openrow();
 *
 * @param array $options
 *
 * @return string
 */
function openrow(array $options = []): string {
    return get_ui()->row->open($options);
}

/**
 * Usage:
 * echo closerow();
 *
 * @return string
 */
function closerow(): string {
    return get_ui()->row->close();
}

/**
 * Usage:
 * echo opengrid();
 *
 * @param array|string $col_sizes
 * @param array        $options
 *
 * @return string
 */
function opengrid($col_sizes = [100], array $options = []): string {
    return get_ui()->grid->open($col_sizes, $options);
}

/**
 * Usage:
 * echo closegrid();
 *
 * @return string
 */
function closegrid(): string {
    return get_ui()->grid->close();
}

/**
 * Usage:
 * echo openform();
 *
 * @param string $method
 * @param string $action
 * @param array  $options
 *
 * @return string
 */
function openform(string $method = 'post', string $action = '', array $options = []): string {
    return get_ui()->form->open($method, $action, $options);
}

/**
 * Usage:
 * echo closeform();
 *
 * @return string
 */
function closeform(): string {
    return get_ui()->form->close();
}

/**
 * Usage:
 * echo input('Test');
 *
 * @param string     $name
 * @param string     $label
 * @param string|int $value
 * @param array      $options
 *
 * @return string
 */
function input(string $name, string $label = '', $value = '', array $options = []): string {
    return get_ui()->input->render($name, $label, $value, $options);
}

/**
 * Usage:
 * echo accordion('test', [
 *     'Title 1' => 'Content 1',
 *     'Title 2' => 'Content 2',
 * ]);
 *
 * @param string $id
 * @param array  $items
 * @param array  $options
 *
 * @return string
 */
function accordion(string $id, array $items, array $options = []): string {
    return get_ui()->accordion->render($id, $items, $options);
}

/**
 * Usage:
 * echo alert('Text');
 *
 * @param string $text
 * @param string $color
 * @param array  $options
 *
 * @return string
 */
function alert(string $text, string $color = 'default', array $options = []): string {
    return get_ui()->alert->render($text, $color, $options);
}

/**
 * Usage:
 * echo badge('Text');
 *
 * @param string $text
 * @param string $color
 * @param array  $options
 *
 * @return string
 */
function badge(string $text, string $color = 'default', array $options = []): string {
    return get_ui()->badge->render($text, $color, $options);
}

/**
 * Usage:
 * echo breadcrumbs([
 *     'Link 1' => 'link1.php',
 *     'Link 2' => 'link2.php',
 * ]);
 *
 * @param array $links
 * @param array $options
 *
 * @return string
 */
function breadcrumbs(array $links, array $options = []): string {
    return get_ui()->breadcrumbs->render($links, $options);
}

/**
 * Usage:
 * echo button('Title');
 *
 * @param string $title
 * @param string $type
 * @param array  $options
 *
 * @return string
 */
function button(string $title, string $type = 'button', array $options = []): string {
    return get_ui()->button->render($title, $type, $options);
}

/**
 * Usage:
 * echo button_group([
 *     'options' => [
 *         1        => 'Yes',
 *         0        => 'No',
 *         'delete' => ['title' => 'Delete', 'btn_options' => ['color' => 'error']],
 *     ]
 * ]);
 *
 * @param array $options
 *
 * @return string
 */
function button_group(array $options = []): string {
    return get_ui()->button_group->render($options);
}

/**
 * Usage:
 * echo card([
 *     'body' => '
 *         <h1>Title</h1>
 *         <p>Testing</p>
 *     ',
 * ]);
 *
 * @param array $options
 *
 * @return string
 */
function card(array $options = []): string {
    return get_ui()->card->render($options);
}

/**
 * Usage:
 * echo carousel('test', [
 *     'Slide 1',
 *     'Slide 2',
 * ]);
 *
 * @param string $id
 * @param array  $slides
 * @param array  $options
 *
 * @return string
 */
function carousel(string $id, array $slides, array $options = []): string {
    return get_ui()->carousel->render($id, $slides, $options);
}

/**
 * Usage:
 * echo dropdown('Dropdown', [
 *     ['title' => 'Item 1', 'link' => 'link1.php'],
 *     'divider',
 *     ['title' => 'Item 2'],
 *     ['custom' => '<b>Custom bold text</b>'],
 * ]);
 *
 * @param string $title
 * @param array  $items
 * @param array  $options
 *
 * @return string
 */
function dropdown(string $title, array $items, array $options = []): string {
    return get_ui()->dropdown->render($title, $items, $options);
}

/**
 * Usage:
 * echo list_group([
 *     'Item 1',
 *     'Item 2',
 * ]);
 *
 * @param array $items
 * @param array $options
 *
 * @return string
 */
function list_group(array $items, array $options = []): string {
    return get_ui()->list_group->render($items, $options);
}

/**
 * Usage:
 * echo menu('test', [
 *    ['title' => 'Item 1', 'link' => 'link1.php'],
 *    ['title' => 'Item 2', 'link' => 'link2.php'],
 *    'dropdown' => [
 *        'title' => 'Dropdown',
 *        ['title' => 'Sub Item 1', 'link' => 'sub_link1.php'],
 *        ['title' => 'Sub Item 2', 'link' => 'sub_link2.php', 'active' => true],
 *    ],
 *]);
 *
 * @param string $id
 * @param array  $items
 * @param array  $options
 *
 * @return string
 */
function menu(string $id, array $items, array $options = []): string {
    return get_ui()->menu->render($id, $items, $options);
}

/**
 * Usage:
 * echo modal('test', [
 *     'title'  => 'Modal Title',
 *     'header' => 'Testttt',
 *     'body'   => '<b>Testing</b>',
 *     'footer' => 'Random text....'
 * ]);
 *
 * @param string $id
 * @param array  $content
 * @param array  $options
 *
 * @return string
 */
function modal(string $id, array $content, array $options = []): string {
    return get_ui()->modal->render($id, $content, $options);
}

/**
 * Usage:
 * echo pagination(range(1, 6), [
 *     'link'    => 'page.php?p={p}',
 *     'current' => 3,
 * ]);
 *
 * @param array $items
 * @param array $options
 *
 * @return string
 */
function pagination(array $items, array $options = []): string {
    return get_ui()->pagination->render($items, $options);
}

/**
 * Usage:
 * echo progress(40);
 *
 * @param int|array $percent
 * @param array     $options
 *
 * @return string
 */
function progress($percent, array $options = []): string {
    return get_ui()->progress->render($percent, $options);
}

/**
 * Usage:
 * echo tabs('test', [
 *     ['title' => 'Tab 1', 'content' => 'Content 1'],
 *     ['title' => 'Tab 2', 'content' => 'Content 2'],
 * ]);
 *
 * @param string $id
 * @param array  $items
 * @param array  $options
 *
 * @return string
 */
function tabs(string $id, array $items, array $options = []): string {
    return get_ui()->tabs->render($id, $items, $options);
}
