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
use Stringable;

class Component implements Stringable {
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

    protected function getComponentName(): string {
        $component_path = explode('/', $this->component);

        return $component_path[array_key_last($component_path)];
    }

    /**
     * Create string from the given array of attributes.
     *
     * @param array<string, mixed> $attributes
     */
    protected function getAttributes(array $attributes): string {
        $array = [];

        foreach ($attributes as $attr => $value) {
            $array[] = $attr.(isset($value) ? '="'.$value.'"' : '');
        }

        return implode(' ', $array);
    }

    /**
     * Get correct value from framework options.
     */
    protected function getOption(string $option, mixed $value, ?string $component = null): mixed {
        $opts = $this->uikit->getFrameworkOption($component ?? $this->getComponentName());
        $default = $opts[$option]['default'] ?? '';

        return isset($opts[$option]) && array_key_exists($value, $opts[$option]) ? $opts[$option][$value] : $default;
    }

    /**
     * Set component attributes.
     *
     * @param array<string, mixed>           $attributes
     * @param array<int, string>|string|null $framework
     */
    public function attributes(array $attributes = [], array|string|null $framework = null): Component {
        if ($this->uikit->checkFramework($framework)) {
            $this->options['attributes'] = array_merge($this->options['attributes'], $attributes);
        }

        return $this;
    }

    /**
     * Set component options.
     *
     * @param array<string, mixed>           $options
     * @param array<int, string>|string|null $framework
     */
    public function options(array $options = [], array|string|null $framework = null): Component {
        if ($this->uikit->checkFramework($framework)) {
            $this->options = [...$this->options, ...$options];
        }

        return $this;
    }

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
     * Set template data.
     *
     * @param array<string, mixed> $data
     */
    protected function setTplData(array $data = []): Component {
        $this->tpl_data = $data;

        return $this;
    }

    public function __toString(): string {
        $this->loadComponentAssets();

        $array = [...$this->options, ...$this->tpl_data];

        if (isset($this->options['id']) && $this->options['id'] !== '') {
            $this->options['attributes']['id'] = $this->options['id'];
        }

        if (isset($this->options['attributes'])) {
            $array['attributes'] = $this->getAttributes($this->options['attributes']);
        }

        return $this->uikit->render($this->component, $array);
    }
}
