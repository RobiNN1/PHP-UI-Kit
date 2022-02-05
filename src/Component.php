<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit;

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
     * @param array $attributes
     *
     * @return string
     */
    public function getAttributes(array $attributes): string {
        $attributes_ = [];
        foreach ($attributes as $attr => $value) {
            $attributes_[] = $attr.(!empty($value) ? '="'.$value.'"' : '');
        }

        return implode(' ', $attributes_);
    }

    /**
     * Check component.
     *
     * @param string $key
     *
     * @return bool
     */
    public function checkComponent(string $key): bool {
        return in_array($key, $this->uikit->getFrameworkOptions('components'));
    }

    /**
     * Message when component is not supported.
     *
     * @param string $key
     * @param string $requires
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
