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

class ListGroup {
    /**
     * @param UiKit $uikit
     * @param array $items   Multidimensional array. E.g. ['Item 1', 'Item 2']
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, array $items, array $options = []): string {
        $component = 'list_group';

        if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [] // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        $attributes += $options['attributes'];

        $context = [
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $uikit->getAttributes($attributes),
            'items'      => $items
        ];

        return $uikit->render('components/'.$component, $context);
    }
}
