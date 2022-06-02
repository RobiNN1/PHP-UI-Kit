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

namespace RobiNN\UiKit\Components;

use RobiNN\UiKit\UiKit;

class Component {
    /**
     * @var ?UiKit
     */
    public ?UiKit $uikit = null;

    /**
     * @var string
     */
    protected string $component = '';

    /**
     * @var array
     */
    protected array $options = [];

    /**
     * @var array
     */
    protected array $tpl_data = [];

    /**
     * Get attributes.
     *
     * @param array $attributes
     *
     * @return string
     */
    public function getAttributes(array $attributes): string {
        $array = [];

        foreach ($attributes as $attr => $value) {
            $array[] = $attr.(isset($value) ? '="'.$value.'"' : '');
        }

        return implode(' ', $array);
    }

    /**
     * Get correct value from framework options.
     *
     * @param string  $option
     * @param mixed   $value
     * @param ?string $component
     *
     * @return mixed
     */
    public function getOption(string $option, mixed $value, string $component = null): mixed {
        $component_path = explode('/', $this->component);
        $opts = $this->uikit->getFrameworkOptions($component ?? $component_path[array_key_last($component_path)]);
        $default = $opts[$option]['default'] ?? '';

        return isset($opts[$option]) && array_key_exists($value, $opts[$option]) ? $opts[$option][$value] : $default;
    }

    /**
     * Render template.
     *
     * @param array $data
     *
     * @return string
     */
    protected function tpl(array $data = []): string {
        $array = array_merge($this->options, $data);

        if (array_key_exists('id', $this->options) && !empty($this->options['id'])) {
            $this->options['attributes']['id'] = $this->options['id'];
        }

        $array['attributes'] = $this->getAttributes($this->options['attributes']);

        return $this->uikit->render($this->component, $array);
    }

    /**
     * Set template data.
     *
     * @param array $data
     *
     * @return object
     */
    protected function tplData(array $data = []): object {
        $this->tpl_data = $data;

        return $this;
    }

    /**
     * Set component options.
     *
     * @param array $options
     *
     * @return object
     */
    public function options(array $options = []): object {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * Set component attributes.
     *
     * @param array $attributes
     *
     * @return object
     */
    public function attributes(array $attributes = []): object {
        $this->options['attributes'] = array_merge($this->options['attributes'], $attributes);

        return $this;
    }

    /**
     * Get HTML of a component.
     *
     * @return string
     */
    public function toHtml(): string {
        return $this->tpl($this->tpl_data);
    }

    /**
     * Render component.
     *
     * @return string
     */
    public function __toString(): string {
        return $this->tpl($this->tpl_data);
    }
}
