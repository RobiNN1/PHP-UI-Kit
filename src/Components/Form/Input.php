<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components\Form;

use RobiNN\UiKit\Components\Component;

class Input extends Component {
    /**
     * @param string     $name    Input name.
     * @param string     $label   Input label.
     * @param string|int $value   Input value.
     * @param array      $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $name, string $label = '', $value = '', array $options = []): string {
        $options = array_merge([
            'id'               => '', // Wrapper ID.
            'input_id'         => '', // Input ID.
            'placeholder'      => '', // Placeholder.
            'type'             => 'text', // Input type.
            'class'            => '', // Class for wrapper.
            'input_class'      => '', // Input class.
            'attributes'       => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'input_attributes' => [], // Array of custom attributes for input, set null as value for attributes without value.
            'size'             => 'default', // Input size. Possible value: default|sm|lg
            'state'            => '', // Validation state. Possible value: success|error
            'left_addon'       => '', // Left addon.
            'right_addon'      => '', // Right addon.
            'left_custom'      => '', // Left custom addon.
            'right_custom'     => '', // Right customaddon.
            'feedback_text'    => '', // Custom feedback text. In your code do validation and then set state and feedback text.
            'help_text'        => '', // Custom help text.
        ], $options);

        $input_attributes = [];

        $input_attributes['id'] = !empty($options['input_id']) ? $options['input_id'] : (!empty($name) ? $name : null);

        if (!empty($name)) {
            $input_attributes['name'] = $name;
        }

        if (!empty($options['placeholder'])) {
            $input_attributes['placeholder'] = $options['placeholder'];
        }

        $input_attributes += $options['input_attributes'];

        $input_types = [
            'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 'month',
            'number', 'password', 'search', 'tel', 'text', 'time', 'url', 'week',
        ];

        $fwoptions = $this->uikit->getFrameworkOptions('input');

        $context = [
            'class'            => $options['class'],
            'input_class'      => $options['input_class'],
            'attributes'       => $this->getAttributes($options['attributes'], $options['id']),
            'input_attributes' => $this->getAttributes($input_attributes),
            'input_id'         => $input_attributes['id'],
            'value'            => $value,
            'type'             => in_array($options['type'], $input_types) ? $options['type'] : 'text',
            'label'            => $label,
            'size'             => $this->getOption('sizes', $options['size'], $fwoptions),
            'state'            => $this->getOption('validation', $options['state'], $fwoptions),
            'left_addon'       => $options['left_addon'],
            'right_addon'      => $options['right_addon'],
            'left_custom'      => $options['left_custom'],
            'right_custom'     => $options['right_custom'],
            'feedback_text'    => $options['feedback_text'],
            'help_text'        => $options['help_text'],
        ];

        return $this->uikit->renderTpl('form/input', $context);
    }
}
