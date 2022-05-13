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
    /**
     * @var string
     */
    protected string $component = 'form/select';

    /**
     * Render select field.
     *
     * @param string     $name    Select name.
     * @param string     $label   Select label.
     * @param int|string $value   Select value.
     * @param array      $items   Select options - array or associative array.
     * @param array      $options Additional options.
     *
     * @return string
     */
    public function render(string $name, string $label = '', int|string $value = '', array $items = [], array $options = []): string {
        $options = array_merge([
            'id'                => '', // Wrapper ID.
            'class'             => '', // Class for wrapper.
            'attributes'        => [], // Array of custom attributes.
            'select_id'         => $name, // Select ID.
            'select_class'      => '', // Select class.
            'select_attributes' => [], // Array of custom attributes for select.
            'placeholder'       => '', // Placeholder.
            'size'              => 'default', // Select size. Possible value: default/sm/lg
            'state'             => '', // Validation state. Possible value: success/error
            'feedback_text'     => '', // Custom feedback text. Do validation in your code and then set state and feedback text.
            'required'          => false, // Required.
            'help_text'         => '', // Custom help text.
            'multiple'          => false, // Multiple.
        ], $options);

        $select_attributes = [];

        $select_attributes['id'] = $options['select_id'];

        if (!empty($name)) {
            $name .= $options['multiple'] && !str_ends_with($name, '[]') ? '[]' : '';
            $select_attributes['name'] = $name;
        }

        if ($options['required']) {
            $select_attributes['required'] = null;
        }

        if ($options['multiple']) {
            $select_attributes['multiple'] = null;
            $select_attributes['size'] = 3;
        }

        $select_attributes += $options['select_attributes'];

        return $this->tpl([
            'value'             => $value,
            'label'             => $label,
            'items'             => $items,
            'class'             => $options['class'],
            'attributes'        => $this->getAttributes($options['attributes'], $options['id']),
            'select_id'         => $select_attributes['id'],
            'select_class'      => $options['select_class'],
            'select_attributes' => $this->getAttributes($select_attributes),
            'size'              => $this->getOption('sizes', $options['size']),
            'state'             => $this->getOption('validation', $options['state']),
            'feedback_text'     => $options['feedback_text'],
            'required'          => $options['required'],
            'help_text'         => $options['help_text'],
            'placeholder'       => $options['placeholder'],
            'multiple'          => $options['multiple'],
        ]);
    }
}
