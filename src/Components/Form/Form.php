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

final class Form extends Component {
    /**
     * @var string
     */
    protected string $component = 'form/form';

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
        $this->options = array_merge([
            'id'         => '', // Form ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'name'       => '', // Name attribute.
            'upload'     => false, // Set true for adding enctype multipart/form-data.
            'open'       => false, // Open form. @internal
            'close'      => false, // Close form. @internal
        ], $options);

        if (!empty($this->options['id'])) {
            $this->options['attributes']['id'] = $this->options['id'];
        }

        if (!empty($this->options['name'])) {
            $this->options['attributes']['name'] = $this->options['name'];
        }

        $this->options['attributes']['method'] = strtolower($method) === 'post' ? 'post' : 'get';

        if (!empty($action)) {
            $this->options['attributes']['action'] = $action;
        }

        if ($this->options['upload']) {
            $this->options['attributes']['enctype'] = 'multipart/form-data';
        }

        return $this->tpl();
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
