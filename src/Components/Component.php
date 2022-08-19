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
use Stringable;

class Component implements Stringable {
    /**
     * @var ?UiKit
     */
    public ?UiKit $uikit = null;

    /**
     * @var string
     */
    protected string $component = '';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [];

    /**
     * @var array<string, mixed>
     */
    protected array $tpl_data = [];

    /**
     * Get attributes.
     *
     * @param array<string, mixed> $attributes
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
     * @param array<string, mixed> $data
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
     * @param array<string, mixed> $data
     *
     * @return static
     */
    protected function tplData(array $data = []): static {
        $this->tpl_data = $data;

        return $this;
    }

    /**
     * Set component options.
     *
     * @param array<string, mixed> $options
     *
     * @return static
     */
    public function options(array $options = []): static {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * Set component attributes.
     *
     * @param array<string, mixed> $attributes
     *
     * @return static
     */
    public function attributes(array $attributes = []): static {
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
