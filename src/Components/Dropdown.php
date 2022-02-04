<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UiKit\Components;

use UiKit\UiKit;

class Dropdown {
    /**
     * @param UiKit  $uikit
     * @param string $id      The ID of Dropdown.
     * @param string $title   Button title.
     * @param array  $items   Multidimensional array. E.g. [['title' => 'Item 1', 'link' => 'link1.php'], ['title' => 'Item 2']]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $id, string $title, array $items, array $options = []): string {
        $component = 'dropdown';

        if (!$uikit->checkComponent('button')) {
            return $uikit->noComponentMsg($component, 'button');
        } else if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'button'     => [] // Button options.
        ], $options);

        $fwoptions = $uikit->getFrameworkOptions($component);

        if (!empty($fwoptions['button']['class'])) {
            $class = !empty($options['button']['class']) ? $options['button']['class'].' ' : '';
            $options['button']['class'] = $class.$fwoptions['button']['class'];
        }

        if (!empty($fwoptions['button']['attributes'])) {
            $attr = !empty($options['button']['attributes']) ? $options['button']['attributes'] : [];
            $options['button']['attributes'] = array_merge($attr, $fwoptions['button']['attributes']);
        }

        if (!empty($fwoptions['button']['title'])) {
            $title = $title.' '.$fwoptions['button']['title'];
        }

        $button = Button::render($uikit, $title, 'button', $options['button']);

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $uikit->getAttributes($options['attributes']),
            'button'     => $button,
            'items'      => $items
        ];

        return $uikit->render('components/'.$component, $context);
    }
}
