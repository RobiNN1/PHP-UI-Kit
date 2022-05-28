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

final class Checkbox extends Component {
    /**
     * @var string
     */
    protected string $component = 'form/checkbox';

    /**
     * Render checkbox field.
     *
     * @param string     $name    Checkbox name.
     * @param string     $label   Checkbox label.
     * @param int|string $value   Checkbox value.
     * @param array      $options Additional options.
     *
     * @return string
     */
    public function render(string $name, string $label = '', int|string $value = 0, array $options = []): string {
        $this->options = array_merge([
            'id'                  => '', // Wrapper ID.
            'class'               => '', // Class for wrapper.
            'attributes'          => [], // Array of custom attributes.
            'items'               => [], // Multiple checkbox items - associative array.
            'checkbox_id'         => $name, // Checkbox ID.
            'checkbox_attributes' => [], // Array of custom attributes for checkbox.
            'radio'               => false, // Change to radio checkbox.
            'state'               => '', // Validation state. Possible value: success/error
            'feedback_text'       => '', // Custom feedback text. Do validation in your code and then set state and feedback text.
            'required'            => false, // Required.
            'disabled'            => false, // Disabled.
            'help_text'           => '', // Custom help text.
        ], $options);

        $checkbox_attributes = [];

        if (!empty($name)) {
            $name .= $this->options['radio'] === false && !str_ends_with($name, '[]') && !empty($this->options['items']) ? '[]' : '';
            $checkbox_attributes['name'] = $name;
        }

        if ($this->options['required']) {
            $checkbox_attributes['required'] = null;
        }

        if ($this->options['disabled']) {
            $checkbox_attributes['disabled'] = null;
        }

        $checkbox_attributes += $this->options['checkbox_attributes'];

        if (empty($this->options['items'])) {
            $value = $value === '' ? 0 : $value;
            $this->options['items'] = [
                $value => $label,
            ];
        }

        return $this->tpl([
            'value'               => $value,
            'label'               => $label,
            'attributes'          => $this->getAttributes($this->options['attributes'], $this->options['id']),
            'checkbox_attributes' => $this->getAttributes($checkbox_attributes),
            'type'                => $this->options['radio'] ? 'radio' : 'checkbox',
            'state'               => $this->getOption('validation', $this->options['state']),
        ]);
    }
}
