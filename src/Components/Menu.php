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

class Menu extends Component {
    /**
     * @param string $id      The ID of Menu.
     * @param array  $items   Multidimensional array. E.g. [['title' => 'Item 1', 'link' => 'link1.php'],]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $id, array $items, array $options = []): string {
        $component = 'menu';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'color'      => 'light', // Menu color. Possible value: light|dark
            'brand'      => ['title' => '', 'link' => '#'], // Site name.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'color'      => $this->getOption('colors', $options['color'], $fwoptions),
            'brand'      => $options['brand'],
            'items'      => $items,
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
