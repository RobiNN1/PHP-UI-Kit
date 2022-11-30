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

class Select extends Component {
    protected string $component = 'form/select';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'                => '', // Wrapper ID.
        'class'             => '', // Class for wrapper.
        'attributes'        => [], // Array of custom attributes.
        'select_id'         => '', // Select ID.
        'select_class'      => '', // Select class.
        'select_attributes' => [], // Array of custom attributes for select.
        'placeholder'       => '', // Placeholder.
        'size'              => 'default', // Select size. Possible value: default/sm/lg
        'state'             => '', // Validation state. Possible value: success/error
        'feedback_text'     => '', // Custom feedback text. Do validation in your code and then set state and feedback text.
        'required'          => false, // Required.
        'disabled'          => false, // Disabled.
        'help_text'         => '', // Custom help text.
        'multiple'          => false, // Multiple.
    ];

    /**
     * Render select field.
     *
     * @param string                        $name    Select name.
     * @param string                        $label   Select label.
     * @param int|string                    $value   Select value.
     * @param array<string|int, string|int> $items   Select options - array or associative array.
     * @param array<string, mixed>          $options Additional options.
     */
    public function render(string $name, string $label = '', int|string $value = '', array $items = [], array $options = []): Component {
        $this->options($options);

        $this->options['select_id'] = $this->options['select_id'] !== '' ? $this->options['select_id'] : $name;

        $this->options['select_attributes']['id'] = $this->options['select_id'];

        if ($name !== '') {
            $name .= $this->options['multiple'] && !str_ends_with($name, '[]') ? '[]' : '';
            $this->options['select_attributes']['name'] = $name;
        }

        if ($this->options['required']) {
            $this->options['select_attributes']['required'] = null;
        }

        if ($this->options['disabled']) {
            $this->options['select_attributes']['disabled'] = null;
        }

        if ($this->options['multiple']) {
            $this->options['select_attributes']['multiple'] = null;
            $this->options['select_attributes']['size'] = 3;
        }

        return $this->setTplData([
            'value'             => $value,
            'label'             => $label,
            'items'             => $items,
            'select_id'         => $this->options['select_attributes']['id'],
            'select_attributes' => $this->getAttributes($this->options['select_attributes']),
            'size'              => $this->getOption('sizes', $this->options['size']),
            'state'             => $this->getOption('validation', $this->options['state']),
        ]);
    }
}
