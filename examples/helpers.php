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
 * @return UiKit\UiKit
 */
function get_ui(): UiKit\UiKit {
    $config = new UiKit\Config([
        'cdn'       => false, // CDN for CSS Frameworks and libs.
        'site_path' => '/assets/', // Path to assests. If site is in the root change it to /assets/.
        'cache'     => __DIR__.'/cache', // Cache object (depends on tpl engine), absolute path or false.
        // 'framework'    => 'bootstrap5' // CSS Framework. Possible value: bootstrap5|semanticui2
        'framework' => isset($_GET['sm']) ? 'semanticui2' : 'bootstrap5' // for development purposes
    ]);

    return UiKit\UiKit::getInstance($config, true);
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
    return UiKit\Layout\Layout::render(get_ui(), $body, $options);
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
    $options = array_merge(['open' => true], $options);
    return UiKit\Layout\Container::render(get_ui(), $fluid, $options);
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
    return UiKit\Layout\Container::render(get_ui(), false, ['close' => true]);
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
    $options = array_merge(['open' => true], $options);
    return UiKit\Layout\Row::render(get_ui(), $options);
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
    return UiKit\Layout\Row::render(get_ui(), ['close' => true]);
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
    $options = array_merge(['open' => true], $options);
    return UiKit\Layout\Grid::render(get_ui(), $col_sizes, $options);
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
    return UiKit\Layout\Grid::render(get_ui(), [], ['close' => true]);
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
    return UiKit\Components\Accordion::render(get_ui(), $id, $items, $options);
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
    return UiKit\Components\Alert::render(get_ui(), $text, $color, $options);
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
    return UiKit\Components\Badge::render(get_ui(), $text, $color, $options);
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
    return UiKit\Components\Breadcrumbs::render(get_ui(), $links, $options);
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
    return UiKit\Components\Button::render(get_ui(), $title, $type, $options);
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
    return UiKit\Components\ButtonGroup::render(get_ui(), $options);
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
    return UiKit\Components\Card::render(get_ui(), $options);
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
    return UiKit\Components\Carousel::render(get_ui(), $id, $slides, $options);
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
    return UiKit\Components\Dropdown::render(get_ui(), $id, $title, $items, $options);
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
    return UiKit\Components\ListGroup::render(get_ui(), $items, $options);
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
    return UiKit\Components\Modal::render(get_ui(), $id, $content, $options);
}
