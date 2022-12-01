<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

if (!function_exists('get_ui')) {
    /**
     * Get a UI Kit instance.
     */
    function get_ui(): RobiNN\UiKit\UiKit {
        return RobiNN\UiKit\UiKit::getInstance();
    }
}

if (!function_exists('layout')) {
    /**
     * Render site layout.
     *
     * @param string               $body    Site content.
     * @param array<string, mixed> $options Additional options.
     */
    function layout(string $body, array $options = []): RobiNN\UiKit\Components\Layout\Layout {
        return get_ui()->layout($body, $options);
    }
}

if (!function_exists('container_open') && !function_exists('container_close')) {
    /**
     * Render opening tag of the container.
     *
     * @param bool                 $fluid   Container without maximum width.
     * @param array<string, mixed> $options Additional options.
     */
    function container_open(bool $fluid = false, array $options = []): RobiNN\UiKit\Components\Layout\Container {
        return get_ui()->container_open($fluid, $options);
    }

    /**
     * Render closing tag of the container.
     */
    function container_close(): string {
        return get_ui()->container_close();
    }
}

if (!function_exists('row_open') && !function_exists('row_close')) {
    /**
     * Render opening tag of the row.
     *
     * @param array<string, mixed> $options Additional options.
     */
    function row_open(array $options = []): RobiNN\UiKit\Components\Layout\Row {
        return get_ui()->row_open($options);
    }

    /**
     * Render closing tag of the row.
     */
    function row_close(): string {
        return get_ui()->row_close();
    }
}

if (!function_exists('grid_open') && !function_exists('grid_close')) {
    /**
     * Render opening tag of the grid.
     *
     * @param array<int, int|string> $col_sizes Column sizes.
     * @param array<string, mixed>   $options   Additional options.
     */
    function grid_open(array $col_sizes = [100], array $options = []): RobiNN\UiKit\Components\Layout\Grid {
        return get_ui()->grid_open($col_sizes, $options);
    }

    /**
     * Render closing tag of the grid.
     */
    function grid_close(): string {
        return get_ui()->grid_close();
    }
}

if (!function_exists('form_open') && !function_exists('form_close')) {
    /**
     * Render opening tag of the form.
     *
     * @param string               $method  Form method. Possible value: get|post
     * @param string               $action  Form action.
     * @param array<string, mixed> $options Additional options.
     */
    function form_open(string $method = 'post', string $action = '', array $options = []): RobiNN\UiKit\Components\Form\Form {
        return get_ui()->form_open($method, $action, $options);
    }

    /**
     * Render closing tag of the form.
     */
    function form_close(): string {
        return get_ui()->form_close();
    }
}

if (!function_exists('input')) {
    /**
     * Render input field.
     *
     * @param string               $name    Input name.
     * @param string               $label   Input label.
     * @param int|string           $value   Input value.
     * @param array<string, mixed> $options Additional options.
     */
    function input(string $name, string $label = '', int|string $value = '', array $options = []): RobiNN\UiKit\Components\Form\Input {
        return get_ui()->input($name, $label, $value, $options);
    }
}

if (!function_exists('select')) {
    /**
     * Render select field.
     *
     * @param string                        $name    Select name.
     * @param string                        $label   Select label.
     * @param int|string                    $value   Select value.
     * @param array<string|int, string|int> $items   Select options - array or associative array.
     * @param array<string, mixed>          $options Additional options.
     */
    function select(string $name, string $label = '', int|string $value = '', array $items = [], array $options = []): RobiNN\UiKit\Components\Form\Select {
        return get_ui()->select($name, $label, $value, $items, $options);
    }
}

if (!function_exists('checkbox')) {
    /**
     * Render checkbox field.
     *
     * @param string               $name    Checkbox name.
     * @param string               $label   Checkbox label.
     * @param int|string           $value   Checkbox value.
     * @param array<string, mixed> $options Additional options.
     */
    function checkbox(string $name, string $label = '', int|string $value = 0, array $options = []): RobiNN\UiKit\Components\Form\Checkbox {
        return get_ui()->checkbox($name, $label, $value, $options);
    }
}

if (!function_exists('textarea')) {
    /**
     * Render textarea field.
     *
     * @param string               $name    Textarea name.
     * @param string               $label   Textarea label.
     * @param int|string           $value   Textarea value.
     * @param array<string, mixed> $options Additional options.
     */
    function textarea(string $name, string $label = '', int|string $value = '', array $options = []): RobiNN\UiKit\Components\Form\Textarea {
        return get_ui()->textarea($name, $label, $value, $options);
    }
}

if (!function_exists('accordion')) {
    /**
     * Render accordion.
     *
     * @param string                $id      Accordion ID.
     * @param array<string, string> $items   Associative array.
     * @param array<string, mixed>  $options Additional options.
     */
    function accordion(string $id, array $items, array $options = []): RobiNN\UiKit\Components\Accordion {
        return get_ui()->accordion($id, $items, $options);
    }
}

if (!function_exists('alert')) {
    /**
     * Render alert.
     *
     * @param string               $text    Alert text.
     * @param string               $color   Alert color. Possible value: default|success|warning|error|info
     * @param array<string, mixed> $options Additional options.
     */
    function alert(string $text, string $color = 'default', array $options = []): RobiNN\UiKit\Components\Alert {
        return get_ui()->alert($text, $color, $options);
    }
}

if (!function_exists('badge')) {
    /**
     * Render badge.
     *
     * @param string               $text    Badge text.
     * @param string               $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array<string, mixed> $options Additional options.
     */
    function badge(string $text, string $color = 'default', array $options = []): RobiNN\UiKit\Components\Badge {
        return get_ui()->badge($text, $color, $options);
    }
}

if (!function_exists('breadcrumbs')) {
    /**
     * Render breadcrumbs.
     *
     * @param array<string, string> $links   Associative array.
     * @param array<string, mixed>  $options Additional options.
     */
    function breadcrumbs(array $links, array $options = []): RobiNN\UiKit\Components\Breadcrumbs {
        return get_ui()->breadcrumbs($links, $options);
    }
}

if (!function_exists('button')) {
    /**
     * Render button.
     *
     * @param string               $title   Button title.
     * @param string               $type    Button type. Possible value: button|submit|reset
     * @param array<string, mixed> $options Additional options.
     */
    function button(string $title, string $type = 'button', array $options = []): RobiNN\UiKit\Components\Button {
        return get_ui()->button($title, $type, $options);
    }
}

if (!function_exists('button_group')) {
    /**
     * Render a button group.
     *
     * @param array<int|string, array<string, mixed>|string> $items   Associative array or multidimensional array.
     * @param array<string, mixed>                           $options Additional options.
     */
    function button_group(array $items, array $options = []): RobiNN\UiKit\Components\ButtonGroup {
        return get_ui()->button_group($items, $options);
    }
}

if (!function_exists('card')) {
    /**
     * Render card.
     *
     * @param array<string, mixed> $options Additional options.
     */
    function card(array $options = []): RobiNN\UiKit\Components\Card {
        return get_ui()->card($options);
    }
}

if (!function_exists('carousel')) {
    /**
     * Render carousel.
     *
     * @param string               $id      Carousel ID.
     * @param array<int, string>   $slides  Array of items.
     * @param array<string, mixed> $options Additional options.
     */
    function carousel(string $id, array $slides, array $options = []): RobiNN\UiKit\Components\Carousel {
        return get_ui()->carousel($id, $slides, $options);
    }
}

if (!function_exists('dropdown')) {
    /**
     * Render dropdown.
     *
     * @param string                                   $title   Button title.
     * @param array<int, array<string, string>|string> $items   Multidimensional array.
     * @param array<string, mixed>                     $options Additional options.
     */
    function dropdown(string $title, array $items, array $options = []): RobiNN\UiKit\Components\Dropdown {
        return get_ui()->dropdown($title, $items, $options);
    }
}

if (!function_exists('list_group')) {
    /**
     * Render a list group.
     *
     * @param array<int, array<string, bool|string>|string> $items   Array of items or multidimensional array.
     * @param array<string, mixed>                          $options Additional options.
     */
    function list_group(array $items, array $options = []): RobiNN\UiKit\Components\ListGroup {
        return get_ui()->list_group($items, $options);
    }
}

if (!function_exists('menu')) {
    /**
     * Render menu.
     *
     * @param string                   $id      The ID of Menu.
     * @param array<int|string, mixed> $items   Multidimensional array.
     * @param array<string, mixed>     $options Additional options.
     */
    function menu(string $id, array $items, array $options = []): RobiNN\UiKit\Components\Menu {
        return get_ui()->menu($id, $items, $options);
    }
}

if (!function_exists('modal')) {
    /**
     * Render modal.
     *
     * @param string                $id      The ID of Modal.
     * @param array<string, string> $content Associative array.
     * @param array<string, mixed>  $options Additional options.
     */
    function modal(string $id, array $content, array $options = []): RobiNN\UiKit\Components\Modal {
        return get_ui()->modal($id, $content, $options);
    }
}

if (!function_exists('pagination')) {
    /**
     * Render pagination.
     *
     * @param array<int|string, int|string> $items   Array of items.
     * @param array<string, mixed>          $options Additional options.
     */
    function pagination(array $items, array $options = []): RobiNN\UiKit\Components\Pagination {
        return get_ui()->pagination($items, $options);
    }
}

if (!function_exists('progress')) {
    /**
     * Render progress.
     *
     * @param int|array<int, int|string> $percent Percents, an array or asociative array for multiple bars.
     * @param array<string, mixed>       $options Additional options.
     */
    function progress(int|array $percent, array $options = []): RobiNN\UiKit\Components\Progress {
        return get_ui()->progress($percent, $options);
    }
}

if (!function_exists('tabs')) {
    /**
     * Render tabs.
     *
     * @param string                                 $id      The ID of Tabs.
     * @param array<int, array<string, bool|string>> $items   Multidimensional array.
     * @param array<string, mixed>                   $options Additional options.
     */
    function tabs(string $id, array $items, array $options = []): RobiNN\UiKit\Components\Tabs {
        return get_ui()->tabs($id, $items, $options);
    }
}
