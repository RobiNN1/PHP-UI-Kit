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

class Textarea extends Component {
    protected string $component = 'form/textarea';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'                  => '', // Wrapper ID.
        'class'               => '', // Class for wrapper.
        'attributes'          => [], // Array of custom attributes.
        'textarea_id'         => '', // Textarea ID.
        'textarea_class'      => '', // Textarea class.
        'textarea_attributes' => [], // Array of custom attributes for textarea.
        'placeholder'         => '', // Placeholder.
        'state'               => '', // Validation state. Possible value: success/error
        'feedback_text'       => '', // Custom feedback text. Do validation in your code and then set state and feedback text.
        'required'            => false, // Required.
        'disabled'            => false, // Disabled.
        'readonly'            => false, // Readonly.
        'help_text'           => '', // Custom help text.
        'rows'                => 4, // Textarea rows.
    ];

    /**
     * Render textarea field.
     *
     * @param string               $name    Textarea name.
     * @param string               $label   Textarea label.
     * @param int|string           $value   Textarea value.
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $name, string $label = '', int|string $value = '', array $options = []): Component {
        $this->options($options);

        $this->options['textarea_id'] = $this->options['textarea_id'] !== '' ? $this->options['textarea_id'] : $name;

        $this->options['textarea_attributes']['id'] = $this->options['textarea_id'];

        if ($name !== '') {
            $this->options['textarea_attributes']['name'] = $name;
        }

        if ($this->options['required']) {
            $this->options['textarea_attributes']['required'] = null;
        }

        if ($this->options['disabled']) {
            $this->options['textarea_attributes']['disabled'] = null;
        }

        if ($this->options['readonly']) {
            $this->options['textarea_attributes']['readonly'] = null;
        }

        $this->options['textarea_attributes']['rows'] = $this->options['rows'];

        return $this->setTplData([
            'value'               => $value,
            'label'               => $label,
            'textarea_id'         => $this->options['textarea_attributes']['id'],
            'textarea_attributes' => $this->getAttributes($this->options['textarea_attributes']),
            'state'               => $this->getOption('validation', $this->options['state']),
        ]);
    }
}
