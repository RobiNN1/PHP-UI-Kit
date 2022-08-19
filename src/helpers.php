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

use RobiNN\UiKit\Components\Component;

if (!function_exists('get_ui')) {
    /**
     * Get a UI Kit object.
     *
     * @return RobiNN\UiKit\UiKit
     */
    function get_ui(): RobiNN\UiKit\UiKit {
        return new RobiNN\UiKit\UiKit();
    }
}

if (!function_exists('layout')) {
    /**
     * Render site layout.
     *
     * @param string               $body    Site content.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function layout(string $body, array $options = []): Component {
        return get_ui()->layout->render($body, $options);
    }
}

if (!function_exists('container_open') && !function_exists('container_close')) {
    /**
     * Render opening tag of the container.
     *
     * @param bool                 $fluid   Container without maximum width.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function container_open(bool $fluid = false, array $options = []): Component {
        return get_ui()->container->open($fluid, $options);
    }

    /**
     * Render closing tag of the container.
     *
     * @return string
     */
    function container_close(): string {
        return get_ui()->container->close();
    }
}

if (!function_exists('row_open') && !function_exists('row_close')) {
    /**
     * Render opening tag of the row.
     *
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function row_open(array $options = []): Component {
        return get_ui()->row->open($options);
    }

    /**
     * Render closing tag of the row.
     *
     * @return string
     */
    function row_close(): string {
        return get_ui()->row->close();
    }
}

if (!function_exists('grid_open') && !function_exists('grid_close')) {
    /**
     * Render opening tag of the grid.
     *
     * @param array<int, mixed>    $col_sizes Column sizes.
     * @param array<string, mixed> $options   Additional options.
     *
     * @return Component
     */
    function grid_open(array $col_sizes = [100], array $options = []): Component {
        return get_ui()->grid->open($col_sizes, $options);
    }

    /**
     * Render closing tag of the grid.
     *
     * @return string
     */
    function grid_close(): string {
        return get_ui()->grid->close();
    }
}

if (!function_exists('form_open') && !function_exists('form_close')) {
    /**
     * Render opening tag of the form.
     *
     * @param string               $method  Form method. Possible value: get|post
     * @param string               $action  Form action.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function form_open(string $method = 'post', string $action = '', array $options = []): Component {
        return get_ui()->form->open($method, $action, $options);
    }

    /**
     * Render closing tag of the form.
     *
     * @return string
     */
    function form_close(): string {
        return get_ui()->form->close();
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
     *
     * @return Component
     */
    function input(string $name, string $label = '', int|string $value = '', array $options = []): Component {
        return get_ui()->input->render($name, $label, $value, $options);
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
     *
     * @return Component
     */
    function select(string $name, string $label = '', int|string $value = '', array $items = [], array $options = []): Component {
        return get_ui()->select->render($name, $label, $value, $items, $options);
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
     *
     * @return Component
     */
    function checkbox(string $name, string $label = '', int|string $value = 0, array $options = []): Component {
        return get_ui()->checkbox->render($name, $label, $value, $options);
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
     *
     * @return Component
     */
    function textarea(string $name, string $label = '', int|string $value = '', array $options = []): Component {
        return get_ui()->textarea->render($name, $label, $value, $options);
    }
}

if (!function_exists('accordion')) {
    /**
     * Render accordion.
     *
     * @param string                $id      Accordion ID.
     * @param array<string, string> $items   Associative array.
     * @param array<string, mixed>  $options Additional options.
     *
     * @return Component
     */
    function accordion(string $id, array $items, array $options = []): Component {
        return get_ui()->accordion->render($id, $items, $options);
    }
}

if (!function_exists('alert')) {
    /**
     * Render alert.
     *
     * @param string               $text    Alert text.
     * @param string               $color   Alert color. Possible value: default|success|warning|error|info
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function alert(string $text, string $color = 'default', array $options = []): Component {
        return get_ui()->alert->render($text, $color, $options);
    }
}

if (!function_exists('badge')) {
    /**
     * Render badge.
     *
     * @param string               $text    Badge text.
     * @param string               $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function badge(string $text, string $color = 'default', array $options = []): Component {
        return get_ui()->badge->render($text, $color, $options);
    }
}

if (!function_exists('breadcrumbs')) {
    /**
     * Render breadcrumbs.
     *
     * @param array<string, mixed> $links   Associative array.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function breadcrumbs(array $links, array $options = []): Component {
        return get_ui()->breadcrumbs->render($links, $options);
    }
}

if (!function_exists('button')) {
    /**
     * Render button.
     *
     * @param string               $title   Button title.
     * @param string               $type    Button type. Possible value: button|submit|reset
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function button(string $title, string $type = 'button', array $options = []): Component {
        return get_ui()->button->render($title, $type, $options);
    }
}

if (!function_exists('button_group')) {
    /**
     * Render a button group.
     *
     * @param array<int|string, mixed> $items   Associative array or multidimensional array.
     * @param array<string, mixed>     $options Additional options.
     *
     * @return Component
     */
    function button_group(array $items, array $options = []): Component {
        return get_ui()->button_group->render($items, $options);
    }
}

if (!function_exists('card')) {
    /**
     * Render card.
     *
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function card(array $options = []): Component {
        return get_ui()->card->render($options);
    }
}

if (!function_exists('carousel')) {
    /**
     * Render carousel.
     *
     * @param string               $id      Carousel ID.
     * @param array<int, string>   $slides  Array of items.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function carousel(string $id, array $slides, array $options = []): Component {
        return get_ui()->carousel->render($id, $slides, $options);
    }
}

if (!function_exists('dropdown')) {
    /**
     * Render dropdown.
     *
     * @param string               $title   Button title.
     * @param array<int, mixed>    $items   Multidimensional array.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function dropdown(string $title, array $items, array $options = []): Component {
        return get_ui()->dropdown->render($title, $items, $options);
    }
}

if (!function_exists('list_group')) {
    /**
     * Render a list group.
     *
     * @param array<int, mixed>    $items   Array of items.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function list_group(array $items, array $options = []): Component {
        return get_ui()->list_group->render($items, $options);
    }
}

if (!function_exists('menu')) {
    /**
     * Render menu.
     *
     * @param string                   $id      The ID of Menu.
     * @param array<int|string, mixed> $items   Multidimensional array.
     * @param array<string, mixed>     $options Additional options.
     *
     * @return Component
     */
    function menu(string $id, array $items, array $options = []): Component {
        return get_ui()->menu->render($id, $items, $options);
    }
}

if (!function_exists('modal')) {
    /**
     * Render modal.
     *
     * @param string                $id      The ID of Modal.
     * @param array<string, string> $content Associative array.
     * @param array<string, mixed>  $options Additional options.
     *
     * @return Component
     */
    function modal(string $id, array $content, array $options = []): Component {
        return get_ui()->modal->render($id, $content, $options);
    }
}

if (!function_exists('pagination')) {
    /**
     * Render pagination.
     *
     * @param array<string|int, mixed> $items   Array of items.
     * @param array<string, mixed>     $options Additional options.
     *
     * @return Component
     */
    function pagination(array $items, array $options = []): Component {
        return get_ui()->pagination->render($items, $options);
    }
}

if (!function_exists('progress')) {
    /**
     * Render progress.
     *
     * @param array<int, mixed>|int $percent Percents, an array or asociative array for multiple bars.
     * @param array<string, mixed>  $options Additional options.
     *
     * @return Component
     */
    function progress(array|int $percent, array $options = []): Component {
        return get_ui()->progress->render($percent, $options);
    }
}

if (!function_exists('tabs')) {
    /**
     * Render tabs.
     *
     * @param string               $id      The ID of Tabs.
     * @param array<int, mixed>    $items   Multidimensional array.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    function tabs(string $id, array $items, array $options = []): Component {
        return get_ui()->tabs->render($id, $items, $options);
    }
}
