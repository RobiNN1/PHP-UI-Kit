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

namespace RobiNN\UiKit\Components;

class Button extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/button';

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
        $options = array_merge([
            'id'         => '', // Button ID.
            'class'      => '', // Button class.
            'attributes' => [], // Array of custom attributes.
            'name'       => '', // Value of name attribute.
            'value'      => null, // Value of value attribute.
            'color'      => 'default', // Button color. Possible value: default/primary/success/warning/error/info
            'size'       => 'default', // Button size. Possible value: default/sm/lg
            'active'     => false, // Active state.
            'disabled'   => false, // Disabled state.
            'link'       => '', // Link.
            'icon'       => '', // Button icon.
            'icon_right' => false, // Show the icon on the right.
            'no_classes' => false, // Set true to remove default classes.
            'menu_dp'    => false, // Set true if is used as menu dropdown button. @internal
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

        if ($options['disabled']) {
            $attributes['disabled'] = '';
        }

        $attributes += $options['attributes'];

        $active_class = $this->getOption('states', 'active');
        $disabled_class = $this->getOption('states', 'disabled');

        return $this->tpl([
            'title'         => $title,
            'type'          => in_array($type, ['button', 'submit', 'reset']) ? $type : 'button',
            'class'         => $options['class'],
            'attributes'    => $this->getAttributes($attributes),
            'color'         => $this->getOption('colors', $options['color']),
            'size'          => $this->getOption('sizes', $options['size']),
            'active'        => $options['active'],
            'disabled'      => $options['disabled'],
            'link'          => $options['link'],
            'icon'          => $options['icon'],
            'icon_right'    => $options['icon_right'],
            'no_classes'    => $options['no_classes'],
            'menu_dp'       => $options['menu_dp'],
            'state_classes' => ($options['active'] ? $active_class : '').($options['disabled'] ? $disabled_class : ''),
        ]);
    }
}
