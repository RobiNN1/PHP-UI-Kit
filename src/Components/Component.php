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

use RobiNN\UiKit\AddTo;
use RobiNN\UiKit\UiKit;

class Component {
    public UiKit $uikit;

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
     * Get component name.
     *
     * @return string
     */
    private function getComponentName(): string {
        $component_path = explode('/', $this->component);

        return $component_path[array_key_last($component_path)];
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
    public function getOption(string $option, $value, string $component = null) {
        $opts = $this->uikit->getFrameworkOption($component ?? $this->getComponentName());
        $default = $opts[$option]['default'] ?? '';

        return isset($opts[$option]) && array_key_exists($value, $opts[$option]) ? $opts[$option][$value] : $default;
    }

    /**
     * Load component assets.
     *
     * @return void
     */
    protected function loadComponentAssets(): void {
        $component_files = $this->uikit->getFrameworkOption($this->getComponentName().'.files');

        if (isset($component_files['css'])) {
            foreach ($component_files['css'] as $css) {
                AddTo::head('<link rel="stylesheet" href="'.$css.'">');
            }
        }

        if (isset($component_files['js'])) {
            foreach ($component_files['js'] as $js) {
                AddTo::footer('<script src="'.$js.'"></script>');
            }
        }
    }

    /**
     * Render template.
     *
     * @param array<string, mixed> $data
     *
     * @return string
     */
    protected function tpl(array $data = []): string {
        $this->loadComponentAssets();

        $array = array_merge($this->options, $data);

        if (array_key_exists('id', $this->options) && $this->options['id'] !== '') {
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
     * @return Component
     */
    protected function tplData(array $data = []): Component {
        $this->tpl_data = $data;

        return $this;
    }

    /**
     * Set component options.
     *
     * @param array<string, mixed>           $options
     * @param string|array<int, string>|null $framework
     *
     * @return Component
     */
    public function options(array $options = [], $framework = null): Component {
        if ($this->uikit->checkFramework($framework)) {
            $this->options = array_merge($this->options, $options);
        }

        return $this;
    }

    /**
     * Set component attributes.
     *
     * @param array<string, mixed>           $attributes
     * @param string|array<int, string>|null $framework
     *
     * @return Component
     */
    public function attributes(array $attributes = [], $framework = null): Component {
        if ($this->uikit->checkFramework($framework)) {
            $this->options['attributes'] = array_merge($this->options['attributes'], $attributes);
        }

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
