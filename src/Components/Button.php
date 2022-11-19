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
    protected string $component = 'components/button';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
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
    ];

    /**
     * Render button.
     *
     * @param string               $title   Button title.
     * @param string               $type    Button type. Possible value: button|submit|reset
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $title, string $type = 'button', array $options = []): Component {
        $this->options($options);

        if ($this->options['id'] !== '') {
            $this->options['attributes']['id'] = $this->options['id'];
        }

        if ($this->options['link'] === '') {
            if ($this->options['name'] !== '') {
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

        return $this->setTplData([
            'title'         => $title,
            'type'          => in_array($type, ['button', 'submit', 'reset'], true) ? $type : 'button',
            'color'         => $this->getOption('colors', $this->options['color']),
            'size'          => $this->getOption('sizes', $this->options['size']),
            'state_classes' => ($this->options['active'] ? $active_class : '').($this->options['disabled'] ? $disabled_class : ''),
        ]);
    }
}
