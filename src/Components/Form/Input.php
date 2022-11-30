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

namespace RobiNN\UiKit\Components\Form;

use RobiNN\UiKit\Components\Component;

class Input extends Component {
    protected string $component = 'form/input';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'               => '', // Wrapper ID.
        'class'            => '', // Class for wrapper.
        'attributes'       => [], // Array of custom attributes.
        'input_id'         => '', // Input ID.
        'input_class'      => '', // Input class.
        'input_attributes' => [], // Array of custom attributes for input.
        'placeholder'      => '', // Placeholder.
        'type'             => 'text', // Input type.
        'size'             => 'default', // Input size. Possible value: default/sm/lg
        'state'            => '', // Validation state. Possible value: success/error
        'feedback_text'    => '', // Custom feedback text. Do validation in your code and then set state and feedback text.
        'required'         => false, // Required.
        'disabled'         => false, // Disabled.
        'readonly'         => false, // Readonly.
        'help_text'        => '', // Custom help text.
        'left_addon'       => '', // Left addon.
        'right_addon'      => '', // Right addon.
        'left_custom'      => '', // Left custom addon.
        'right_custom'     => '', // Right custom addon.
    ];

    /**
     * Render input field.
     *
     * @param string               $name    Input name.
     * @param string               $label   Input label.
     * @param int|string           $value   Input value.
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $name, string $label = '', int|string $value = '', array $options = []): Component {
        $this->options($options);

        $this->options['input_id'] = $this->options['input_id'] !== '' ? $this->options['input_id'] : $name;

        $this->options['input_attributes']['id'] = $this->options['input_id'];

        if ($name !== '') {
            $this->options['input_attributes']['name'] = $name;
        }

        if ($this->options['placeholder'] !== '') {
            $this->options['input_attributes']['placeholder'] = $this->options['placeholder'];
        }

        if ($this->options['required']) {
            $this->options['input_attributes']['required'] = null;
        }

        if ($this->options['disabled']) {
            $this->options['input_attributes']['disabled'] = null;
        }

        if ($this->options['readonly']) {
            $this->options['input_attributes']['readonly'] = null;
        }

        $input_types = [
            'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 'month',
            'number', 'password', 'search', 'tel', 'text', 'time', 'url', 'week',
        ];

        return $this->setTplData([
            'value'            => $value,
            'label'            => $label,
            'input_id'         => $this->options['input_attributes']['id'],
            'input_attributes' => $this->getAttributes($this->options['input_attributes']),
            'type'             => in_array($this->options['type'], $input_types, true) ? $this->options['type'] : 'text',
            'size'             => $this->getOption('sizes', $this->options['size']),
            'state'            => $this->getOption('validation', $this->options['state']),
        ]);
    }
}
