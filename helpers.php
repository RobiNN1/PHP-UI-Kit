<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('get_ui')) {
    /**
     * Return UI Kit instance.
     *
     * @return RobiNN\UiKit\UiKit
     */
    function get_ui(): RobiNN\UiKit\UiKit {
        return RobiNN\UiKit\UiKit::getInstance(new RobiNN\UiKit\Config());
    }
}

if (!function_exists('layout')) {
    /**
     * Render site layout.
     *
     * @param string $body    Site content.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function layout(string $body, array $options = []): string {
        return get_ui()->layout->render($body, $options);
    }
}

if (!function_exists('container_open') && !function_exists('container_close')) {
    /**
     * Render opening tag of the container.
     *
     * @param bool  $fluid   Container without maximum width.
     * @param array $options Additional options.
     *
     * @return string
     */
    function container_open(bool $fluid = false, array $options = []): string {
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
     * @param array $options Additional options.
     *
     * @return string
     */
    function row_open(array $options = []): string {
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
     * @param array|string $col_sizes Column sizes.
     * @param array        $options   Additional options.
     *
     * @return string
     */
    function grid_open($col_sizes = [100], array $options = []): string {
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
     * @param string $method  Form method. Possible value: get|post
     * @param string $action  Form action.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function form_open(string $method = 'post', string $action = '', array $options = []): string {
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
     * @param string     $name    Input name.
     * @param string     $label   Input label.
     * @param string|int $value   Input value.
     * @param array      $options Additional options.
     *
     * @return string
     */
    function input(string $name, string $label = '', $value = '', array $options = []): string {
        return get_ui()->input->render($name, $label, $value, $options);
    }
}

if (!function_exists('accordion')) {
    /**
     * Render accordion.
     *
     * @param string $id      Accordion ID.
     * @param array  $items   Associative array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function accordion(string $id, array $items, array $options = []): string {
        return get_ui()->accordion->render($id, $items, $options);
    }
}

if (!function_exists('alert')) {
    /**
     * Render alert.
     *
     * @param string $text    Alert text.
     * @param string $color   Alert color. Possible value: default|success|warning|error|info
     * @param array  $options Additional options.
     *
     * @return string
     */
    function alert(string $text, string $color = 'default', array $options = []): string {
        return get_ui()->alert->render($text, $color, $options);
    }
}

if (!function_exists('badge')) {
    /**
     * Render badge.
     *
     * @param string $text    Badge text.
     * @param string $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array  $options Additional options.
     *
     * @return string
     */
    function badge(string $text, string $color = 'default', array $options = []): string {
        return get_ui()->badge->render($text, $color, $options);
    }
}

if (!function_exists('breadcrumbs')) {
    /**
     * Render breadcrumbs.
     *
     * @param array $links   Associative array.
     * @param array $options Additional options.
     *
     * @return string
     */
    function breadcrumbs(array $links, array $options = []): string {
        return get_ui()->breadcrumbs->render($links, $options);
    }
}

if (!function_exists('button')) {
    /**
     * Render button.
     *
     * @param string $title   Button title.
     * @param string $type    Button type. Possible value: button|submit|reset
     * @param array  $options Additional options.
     *
     * @return string
     */
    function button(string $title, string $type = 'button', array $options = []): string {
        return get_ui()->button->render($title, $type, $options);
    }
}

if (!function_exists('button_group')) {
    /**
     * Render button group.
     *
     * @param array $items   Array of buttons.
     * @param array $options Additional options.
     *
     * @return string
     */
    function button_group(array $items, array $options = []): string {
        return get_ui()->button_group->render($items, $options);
    }
}

if (!function_exists('card')) {
    /**
     * Render card.
     *
     * @param array $options Additional options.
     *
     * @return string
     */
    function card(array $options = []): string {
        return get_ui()->card->render($options);
    }
}

if (!function_exists('carousel')) {
    /**
     * Render carousel.
     *
     * @param string $id      Carousel ID.
     * @param array  $slides  Array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function carousel(string $id, array $slides, array $options = []): string {
        return get_ui()->carousel->render($id, $slides, $options);
    }
}

if (!function_exists('dropdown')) {
    /**
     * Render dropdown.
     *
     * @param string $title   Button title.
     * @param array  $items   Multidimensional array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function dropdown(string $title, array $items, array $options = []): string {
        return get_ui()->dropdown->render($title, $items, $options);
    }
}

if (!function_exists('list_group')) {
    /**
     * Render list group.
     *
     * @param array $items   Multidimensional array.
     * @param array $options Additional options.
     *
     * @return string
     */
    function list_group(array $items, array $options = []): string {
        return get_ui()->list_group->render($items, $options);
    }
}

if (!function_exists('menu')) {
    /**
     * Render menu.
     *
     * @param string $id      The ID of Menu.
     * @param array  $items   Multidimensional array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function menu(string $id, array $items, array $options = []): string {
        return get_ui()->menu->render($id, $items, $options);
    }
}

if (!function_exists('modal')) {
    /**
     * Render modal.
     *
     * @param string $id      The ID of Modal.
     * @param array  $content Associative array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function modal(string $id, array $content, array $options = []): string {
        return get_ui()->modal->render($id, $content, $options);
    }
}

if (!function_exists('pagination')) {
    /**
     * Render pagination.
     *
     * @param array $items   Array of items.
     * @param array $options Additional options.
     *
     * @return string
     */
    function pagination(array $items, array $options = []): string {
        return get_ui()->pagination->render($items, $options);
    }
}

if (!function_exists('progress')) {
    /**
     * Render progress.
     *
     * @param int|array $percent Percents, array or asociative array for multiple bars.
     * @param array     $options Additional options.
     *
     * @return string
     */
    function progress($percent, array $options = []): string {
        return get_ui()->progress->render($percent, $options);
    }
}

if (!function_exists('tabs')) {
    /**
     * Render tabs.
     *
     * @param string $id      The ID of Tabs.
     * @param array  $items   Multidimensional array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    function tabs(string $id, array $items, array $options = []): string {
        return get_ui()->tabs->render($id, $items, $options);
    }
}
