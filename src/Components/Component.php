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
     * Get attributes.
     *
     * @param array  $attributes
     * @param string $id
     *
     * @return string
     */
    public function getAttributes(array $attributes, string $id = ''): string {
        $attributes_array = [];

        if (!empty($id)) {
            $attributes_array['id'] = $id;
        }

        $attributes_array += $attributes;

        $array = [];
        foreach ($attributes_array as $attr => $value) {
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
        $opts = $this->uikit->getFrameworkOptions($component ?? ($component_path[1] ?? $component_path[0]));
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
    public function tpl(array $data = []): string {
        return $this->uikit->render($this->component, $data);
    }
}
