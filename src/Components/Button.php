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

final class Button extends Component {
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
        $this->options = array_merge([
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

        if (!empty($this->options['id'])) {
            $this->options['attributes']['id'] = $this->options['id'];
        }

        if (empty($this->options['link'])) {
            if (!empty($this->options['name'])) {
                $this->options['attributes']['name'] = $this->options['name'];
            }

            if (isset($this->options['value'])) {
                $this->options['attributes']['value'] = $this->options['value'];
            }
        }

        if ($this->options['disabled']) {
            $this->options['attributes']['disabled'] = '';
        }

        $active_class = $this->getOption('states', 'active');
        $disabled_class = $this->getOption('states', 'disabled');

        return $this->tpl([
            'title'         => $title,
            'type'          => in_array($type, ['button', 'submit', 'reset']) ? $type : 'button',
            'color'         => $this->getOption('colors', $this->options['color']),
            'size'          => $this->getOption('sizes', $this->options['size']),
            'state_classes' => ($this->options['active'] ? $active_class : '').($this->options['disabled'] ? $disabled_class : ''),
        ]);
    }
}
