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
    /**
     * @var string
     */
    protected string $component = 'form/textarea';

    /**
     * Render textarea field.
     *
     * @param string     $name    Textarea name.
     * @param string     $label   Textarea label.
     * @param int|string $value   Textarea value.
     * @param array      $options Additional options.
     *
     * @return string
     */
    public function render(string $name, string $label = '', int|string $value = '', array $options = []): string {
        $options = array_merge([
            'id'                  => '', // Wrapper ID.
            'class'               => '', // Class for wrapper.
            'attributes'          => [], // Array of custom attributes.
            'textarea_id'         => $name, // Textarea ID.
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
        ], $options);

        $textarea_attributes = [];

        $textarea_attributes['id'] = $options['textarea_id'];

        if (!empty($name)) {
            $textarea_attributes['name'] = $name;
        }

        if ($options['required']) {
            $textarea_attributes['required'] = null;
        }

        if ($options['disabled']) {
            $textarea_attributes['disabled'] = null;
        }

        if ($options['readonly']) {
            $textarea_attributes['readonly'] = null;
        }

        $textarea_attributes['rows'] = $options['rows'];

        $textarea_attributes += $options['textarea_attributes'];

        return $this->tpl([
            'value'               => $value,
            'label'               => $label,
            'class'               => $options['class'],
            'attributes'          => $this->getAttributes($options['attributes'], $options['id']),
            'textarea_id'         => $textarea_attributes['id'],
            'textarea_class'      => $options['textarea_class'],
            'textarea_attributes' => $this->getAttributes($textarea_attributes),
            'state'               => $this->getOption('validation', $options['state']),
            'feedback_text'       => $options['feedback_text'],
            'required'            => $options['required'],
            'disabled'            => $options['disabled'],
            'readonly'            => $options['readonly'],
            'help_text'           => $options['help_text'],
            'placeholder'         => $options['placeholder'],
        ]);
    }
}
