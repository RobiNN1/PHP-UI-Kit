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

class Accordion extends Component {
    /**
     * @param string $id      The ID of Accordion.
     * @param array  $items   Associative array. E.g. ['Title 1' => 'Content 1', 'Title 2' => 'Content 2',]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $id, array $items, array $options = []): string {
        $component = 'accordion';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'first_open' => false // Set true to open first item.
        ], $options);

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'items'      => $items,
            'first_open' => $options['first_open']
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
