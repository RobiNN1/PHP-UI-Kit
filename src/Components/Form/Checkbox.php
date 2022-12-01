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

class Checkbox extends Component {
    protected string $component = 'form/checkbox';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'                  => '', // Wrapper ID.
        'class'               => '', // Class for wrapper.
        'attributes'          => [], // Array of custom attributes.
        'items'               => [], // Multiple checkbox items - associative array.
        'checkbox_id'         => '', // Checkbox ID.
        'checkbox_attributes' => [], // Array of custom attributes for checkbox.
        'radio'               => false, // Change to radio checkbox.
        'state'               => '', // Validation state. Possible value: success/error
        'feedback_text'       => '', // Custom feedback text. Do validation in your code and then set state and feedback text.
        'required'            => false, // Required.
        'disabled'            => false, // Disabled.
        'help_text'           => '', // Custom help text.
    ];

    /**
     * Render checkbox field.
     *
     * @param string               $name    Checkbox name.
     * @param string               $label   Checkbox label.
     * @param int|string           $value   Checkbox value.
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $name, string $label = '', int|string $value = 0, array $options = []): Component {
        $this->options($options);

        $this->options['checkbox_id'] = $this->options['checkbox_id'] !== '' ? $this->options['checkbox_id'] : $name;

        if ($name !== '') {
            $name .= $this->options['radio'] === false && !str_ends_with($name, '[]') && count((array) $this->options['items']) > 0 ? '[]' : '';
            $this->options['checkbox_attributes']['name'] = $name;
        }

        if ($this->options['required']) {
            $this->options['checkbox_attributes']['required'] = null;
        }

        if ($this->options['disabled']) {
            $this->options['checkbox_attributes']['disabled'] = null;
        }

        if (count((array) $this->options['items']) === 0) {
            $value = $value === '' ? 0 : $value;
            $this->options['items'] = [
                $value => $label,
            ];
        }

        return $this->setTplData([
            'value'               => $value,
            'label'               => $label,
            'checkbox_attributes' => $this->getAttributes($this->options['checkbox_attributes']),
            'type'                => $this->options['radio'] ? 'radio' : 'checkbox',
            'state'               => $this->getOption('validation', $this->options['state']),
        ]);
    }
}
