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
     * Render input field.
     *
     * @param string     $name    Input name.
     * @param string     $label   Input label.
     * @param int|string $value   Input value.
     * @param array      $options Additional options.
     *
     * @return string
     */
    public function render(string $name, string $label = '', int|string $value = '', array $options = []): string {
        $options = array_merge([
            'id'               => '', // Wrapper ID.
            'class'            => '', // Class for wrapper.
            'attributes'       => [], // Array of custom attributes.
            'input_id'         => $name, // Input ID.
            'input_class'      => '', // Input class.
            'input_attributes' => [], // Array of custom attributes for input.
            'placeholder'      => '', // Placeholder.
            'type'             => 'text', // Input type.
            'size'             => 'default', // Input size. Possible value: default/sm/lg
            'state'            => '', // Validation state. Possible value: success/error
            'feedback_text'    => '', // Custom feedback text. In your code do validation and then set state and feedback text.
            'required'         => false, // Required.
            'help_text'        => '', // Custom help text.
            'left_addon'       => '', // Left addon.
            'right_addon'      => '', // Right addon.
            'left_custom'      => '', // Left custom addon.
            'right_custom'     => '', // Right custom addon.
        ], $options);

        $input_attributes = [];

        $input_attributes['id'] = $options['input_id'];

        if (!empty($name)) {
            $input_attributes['name'] = $name;
        }

        if (!empty($options['placeholder'])) {
            $input_attributes['placeholder'] = $options['placeholder'];
        }

        if (!empty($options['required'])) {
            $input_attributes['required'] = null;
        }

        $input_attributes += $options['input_attributes'];

        $input_types = [
            'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 'month',
            'number', 'password', 'search', 'tel', 'text', 'time', 'url', 'week',
        ];

        $fwoptions = $this->uikit->getFrameworkOptions('input');

        return $this->uikit->renderTpl('form/input', [
            'value'            => $value,
            'label'            => $label,
            'class'            => $options['class'],
            'attributes'       => $this->getAttributes($options['attributes'], $options['id']),
            'input_id'         => $input_attributes['id'],
            'input_class'      => $options['input_class'],
            'input_attributes' => $this->getAttributes($input_attributes),
            'type'             => in_array($options['type'], $input_types) ? $options['type'] : 'text',
            'size'             => $this->getOption('sizes', $options['size'], $fwoptions),
            'state'            => $this->getOption('validation', $options['state'], $fwoptions),
            'feedback_text'    => $options['feedback_text'],
            'required'         => $options['required'],
            'help_text'        => $options['help_text'],
            'left_addon'       => $options['left_addon'],
            'right_addon'      => $options['right_addon'],
            'left_custom'      => $options['left_custom'],
            'right_custom'     => $options['right_custom'],
        ]);
    }
}
