<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components;

use RobiNN\UiKit\UiKit;

/**
 * @internal
 */
class Component {
    /**
     * @var UiKit
     */
    public UiKit $uikit;

    /**
     * @param UiKit $uikit
     */
    public function __construct(UiKit $uikit) {
        $this->uikit = $uikit;
    }

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
        return in_array($value, array_keys($opts[$option])) ? $opts[$option][$value] : $default;
    }

    /**
     * Check component.
     *
     * @param string $key Component name.
     *
     * @return bool
     */
    public function checkComponent(string $key): bool {
        return in_array($key, $this->uikit->getFrameworkOptions('components'));
    }

    /**
     * Message when component is not supported.
     *
     * @param string $key      Component name.
     * @param string $requires Name of required component.
     *
     * @return string
     */
    public function noComponentMsg(string $key, string $requires = ''): string {
        if (!empty($requires) && !$this->checkComponent($requires)) {
            return sprintf('Component <b>%s</b> requires support for <b>%s</b> component in <b>%s</b> framework.',
                $key, $requires, $this->uikit->getFramework());
        }

        return sprintf('Component <b>%s</b> is not supported in <b>%s</b> framework.', $key, $this->uikit->getFramework());
    }
}
