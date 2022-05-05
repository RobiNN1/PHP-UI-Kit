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

class Form extends Component {
    /**
     * Render form.
     *
     * @param string $method  Form method. Possible value: get|post
     * @param string $action  Form action.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $method = 'post', string $action = '', array $options = []): string {
        $options = array_merge([
            'id'         => '', // Form ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'name'       => '', // Name attribute.
            'upload'     => false, // Set true for adding enctype multipart/form-data.
            'open'       => false, // Open form. @internal
            'close'      => false, // Close form. @internal
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

        return $this->uikit->render('form/form', [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($attributes),
            'open'       => $options['open'],
            'close'      => $options['close'],
        ]);
    }

    /**
     * Render opening tag of the form.
     *
     * @param string $method  Form method. Possible value: get|post
     * @param string $action  Form action.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function open(string $method = 'post', string $action = '', array $options = []): string {
        return $this->render($method, $action, array_merge(['open' => true], $options));
    }

    /**
     * Render closing tag of the form.
     *
     * @return string
     */
    public function close(): string {
        return $this->render('', '', ['close' => true]);
    }
}
