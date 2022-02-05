<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components\Layout;

use RobiNN\UiKit\Components\Component;

class Container extends Component {
    /**
     * @param bool  $fluid   Container without maximum width.
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(bool $fluid = false, array $options = []): string {
        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'open'       => false, // Opening div.
            'close'      => false // Closing div.
        ], $options);

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'open'       => $options['open'],
            'close'      => $options['close'],
            'fluid'      => $fluid
        ];

        return $this->uikit->renderTpl('layout/container', $context);
    }
}