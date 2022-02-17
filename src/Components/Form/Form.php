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

class Form extends Component {
    /**
     * @param string $method  Form method. Possible value: get|post
     * @param string $action  Form action.
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $method = 'post', string $action = '', array $options = []): string {
        $options = array_merge([
            'id'         => '', // Form ID.
            'name'       => '', // Name attribute.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'open'       => false, // Open form.
            'close'      => false, // Close form.
            'upload'     => false, // Set true for adding enctype multipart/form-data.
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        if (!empty($options['name'])) {
            $attributes['name'] = $options['name'];
        }

        $attributes['method'] = strtolower($method) === 'post' ? 'post' : 'get';

        if (!empty($action)) {
            $attributes['action'] = $action;
        }

        if ($options['upload']) {
            $attributes['enctype'] = 'multipart/form-data';
        }

        $attributes += $options['attributes'];

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($attributes),
            'open'       => $options['open'],
            'close'      => $options['close'],
        ];

        return $this->uikit->renderTpl('form/form', $context);
    }

    /**
     * @param string $method  Form method. Possible value: get|post
     * @param string $action  Form action.
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function open(string $method = 'post', string $action = '', array $options = []): string {
        return $this->render($method, $action, array_merge(['open' => true], $options));
    }

    /**
     * @return string
     */
    public function close(): string {
        return $this->render('', '', ['close' => true]);
    }
}
