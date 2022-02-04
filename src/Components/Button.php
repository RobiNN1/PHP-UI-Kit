<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UiKit\Components;

use UiKit\UiKit;

class Button {
    /**
     * @param UiKit  $uikit
     * @param string $title   Button title.
     * @param string $type    Button type. Possible value: button|submit|reset
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $title, string $type = 'button', array $options = []): string {
        $component = 'button';

        if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Button ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'name'       => '', // Value of name attribute.
            'value'      => null, // Value of value attribute.
            'color'      => 'default', // Button color. Possible value: default|primary|success|warning|error|info
            'size'       => 'default', // Button size. Possible value: default|sm|lg
            'disabled'   => false, // Disabled state.
            'active'     => false, // Active state.
            'link'       => '', // Link.
            'icon'       => '', // Button icon.
            'icon_right' => false // Show the icon to the right.
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        if (empty($options['link'])) {
            if (!empty($options['name'])) {
                $attributes['name'] = $options['name'];
            }

            if (isset($options['value'])) {
                $attributes['value'] = $options['value'];
            }
        }

        if ($options['disabled'] === true) {
            $attributes['disabled'] = '';
        }

        $attributes += $options['attributes'];

        $fwoptions = $uikit->getFrameworkOptions($component);

        $context = [
            'class'      => $options['class'],
            'attributes' => $uikit->getAttributes($attributes),
            'title'      => $title,
            'color'      => $uikit->getOption('colors', $options['color'], $fwoptions),
            'type'       => in_array($type, ['button', 'submit', 'reset']) ? $type : 'button',
            'size'       => $uikit->getOption('sizes', $options['size'], $fwoptions),
            'disabled'   => $options['disabled'],
            'active'     => $options['active'],
            'link'       => $options['link'],
            'icon'       => $options['icon'],
            'icon_right' => $options['icon_right']
        ];

        return $uikit->render('components/'.$component, $context);
    }
}
