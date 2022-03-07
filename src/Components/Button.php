<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components;

class Button extends Component {
    /**
     * Render button.
     *
     * @param string $title   Button title.
     * @param string $type    Button type. Possible value: button|submit|reset
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $title, string $type = 'button', array $options = []): string {
        $component = 'button';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Button ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value.
            'name'       => '', // Value of name attribute.
            'value'      => null, // Value of value attribute.
            'color'      => 'default', // Button color. Possible value: default|primary|success|warning|error|info
            'size'       => 'default', // Button size. Possible value: default|sm|lg
            'active'     => false, // Active state.
            'disabled'   => false, // Disabled state.
            'link'       => '', // Link.
            'icon'       => '', // Button icon.
            'icon_right' => false, // Show the icon to the right.
            'menu_dp'    => false, // Set true if is used as menu dropdown button.
            'no_classes' => false, // Set true to remove default classes.
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

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $active_class = $this->getOption('states', 'active', $fwoptions);
        $disabled_class = $this->getOption('states', 'disabled', $fwoptions);

        return $this->uikit->renderTpl('components/'.$component, [
            'class'         => $options['class'],
            'attributes'    => $this->getAttributes($attributes),
            'title'         => $title,
            'color'         => $this->getOption('colors', $options['color'], $fwoptions),
            'type'          => in_array($type, ['button', 'submit', 'reset']) ? $type : 'button',
            'size'          => $this->getOption('sizes', $options['size'], $fwoptions),
            'active'        => $options['active'],
            'disabled'      => $options['disabled'],
            'link'          => $options['link'],
            'icon'          => $options['icon'],
            'icon_right'    => $options['icon_right'],
            'menu_dp'       => $options['menu_dp'],
            'state_classes' => ($options['active'] ? $active_class : '').($options['disabled'] ? $disabled_class : ''),
            'no_classes'    => $options['no_classes'],
        ]);
    }
}
