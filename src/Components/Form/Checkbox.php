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
        $options = array_merge([
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
            'help_text'           => '', // Custom help text.
        ], $options);

        $checkbox_attributes = [];

        if (!empty($name)) {
            $name .= $options['radio'] === false && !str_ends_with($name, '[]') && !empty($options['items']) ? '[]' : '';
            $checkbox_attributes['name'] = $name;
        }

        if ($options['required']) {
            $checkbox_attributes['required'] = null;
        }

        $checkbox_attributes += $options['checkbox_attributes'];

        if (empty($options['items'])) {
            $value = $value === '' ? 0 : $value;
            $options['items'] = [
                $value => $label,
            ];
        }

        $fwoptions = $this->uikit->getFrameworkOptions('checkbox');

        return $this->uikit->render('form/checkbox', [
            'value'               => $value,
            'label'               => $label,
            'class'               => $options['class'],
            'attributes'          => $this->getAttributes($options['attributes'], $options['id']),
            'items'               => $options['items'],
            'checkbox_id'         => $options['checkbox_id'],
            'checkbox_attributes' => $this->getAttributes($checkbox_attributes),
            'type'                => $options['radio'] ? 'radio' : 'checkbox',
            'state'               => $this->getOption('validation', $options['state'], $fwoptions),
            'feedback_text'       => $options['feedback_text'],
            'required'            => $options['required'],
            'help_text'           => $options['help_text'],
        ]);
    }
}
