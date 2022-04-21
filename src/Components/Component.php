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
     * Get correct value from options.
     *
     * @param string $option
     * @param mixed  $value
     * @param array  $opts
     *
     * @return mixed
     */
    public function getOption(string $option, mixed $value, array $opts): mixed {
        $default = $opts[$option]['default'] ?? '';
        return isset($opts[$option]) && array_key_exists($value, $opts[$option]) ? $opts[$option][$value] : $default;
    }
}
