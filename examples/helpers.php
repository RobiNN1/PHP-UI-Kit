<?php
/**
 * Simple helper functions. The code can be written entirely in OOP or procedurally, it's up to you.
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
        'framework' => isset($_GET['sm']) ? 'semanticui2' : 'bootstrap5' // for development purposes
    ]);

    return RobiNN\UiKit\UiKit::getInstance($config, true);
}

/**
 * Page layout
 *
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
 * Open container
 *
 * Usage:
 * echo opencontainer();
 *
 * @param bool  $fluid
 * @param array $options
 *
 * @return string
 */
function opencontainer(bool $fluid = false, array $options = []): string {
    return get_ui()->container->render($fluid, array_merge(['open' => true], $options));
}

/**
 * Close container
 *
 * Usage:
 * echo closecontainer();
 *
 * @return string
 */
function closecontainer(): string {
    return get_ui()->container->render(false, ['close' => true]);
}

/**
 * Open row
 *
 * Usage:
 * echo openrow();
 *
 * @param array $options
 *
 * @return string
 */
function openrow(array $options = []): string {
    return get_ui()->row->render(array_merge(['open' => true], $options));
}

/**
 * Close row
 *
 * Usage:
 * echo closerow();
 *
 * @return string
 */
function closerow(): string {
    return get_ui()->row->render(['close' => true]);
}

/**
 * Open grid
 *
 * Usage:
 * echo opengrid();
 *
 * @param array|string $col_sizes
 * @param array        $options
 *
 * @return string
 */
function opengrid($col_sizes = [100], array $options = []): string {
    return get_ui()->grid->render($col_sizes, array_merge(['open' => true], $options));
}

/**
 * Close grid
 *
 * Usage:
 * echo closegrid();
 *
 * @return string
 */
function closegrid(): string {
    return get_ui()->grid->render([], ['close' => true]);
}

/**
 * Accordion
 *
 * Usage:
 * echo accordion('test', [
 * 'Title 1' => 'Content 1',
 * 'Title 2' => 'Content 2',
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
 * Alert
 *
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
 * Badge
 *
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
 * Breadcrumbs
 *
 * Usage:
 * echo breadcrumbs([
 * 'Link 1' => 'link1.php',
 * 'Link 2' => 'link2.php',
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
 * Button
 *
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
 * Button group
 *
 * Usage:
 * echo button_group([
 * 'options' => [
 * 1        => 'Yes',
 * 0        => 'No',
 * 'delete' => ['title' => 'Delete', 'btn_options' => ['color' => 'error']]
 * ]
 * ]);
 *
 * @param array $options
 *
 * @return string
 */
function button_group(array $options = []): string {
    return get_ui()->buttongroup->render($options);
}

/**
 * Card
 *
 * Usage:
 * echo card([
 * 'body' => '
 * <h1>Title</h1>
 * <p>Testing</p>
 * '
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
 * Carousel
 *
 * Usage:
 * echo carousel('test', [
 * 'Slide 1',
 * 'Slide 2',
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
 * Dropdown
 *
 * Usage:
 * echo dropdown('test', 'Dropdown', [
 * ['title' => 'Item 1', 'link' => 'link1.php'],
 * 'divider',
 * ['title' => 'Item 2'],
 * ['custom' => '<b>Custom bold text</b>']
 * ]);
 *
 * @param string $id
 * @param string $title
 * @param array  $items
 * @param array  $options
 *
 * @return string
 */
function dropdown(string $id, string $title, array $items, array $options = []): string {
    return get_ui()->dropdown->render($id, $title, $items, $options);
}

/**
 * List group
 *
 * Usage:
 * echo list_group(['Item 1', 'Item 2']);
 *
 * @param array $items
 * @param array $options
 *
 * @return string
 */
function list_group(array $items, array $options = []): string {
    return get_ui()->listgroup->render($items, $options);
}

/**
 * Modal
 *
 * Usage:
 * echo modal('test', [
 * 'title'  => 'Modal Title',
 * 'header' => 'Testttt',
 * 'body'   => '<b>Testing</b>',
 * 'footer' => 'Random text....'
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
 * Tabs
 *
 * Usage:
 * echo tabs('test', [
 * ['title' => 'Tab 1', 'content' => 'Content 1'],
 * ['title' => 'Tab 2', 'content' => 'Content 2'],
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
