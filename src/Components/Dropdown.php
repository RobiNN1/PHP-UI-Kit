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

class Dropdown extends Component {
    /**
     * @param string $id      The ID of Dropdown.
     * @param string $title   Button title.
     * @param array  $items   Multidimensional array. E.g. [['title' => 'Item 1', 'link' => 'link1.php'], ['title' => 'Item 2']]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $id, string $title, array $items, array $options = []): string {
        $component = 'dropdown';

        if (!$this->checkComponent('button')) {
            return $this->noComponentMsg($component, 'button');
        } else if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'button'     => [], // Button options.
            'in_menu'    => false, // Set true if is used in menu.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

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

        $button = $this->uikit->button->render($title, 'button', $options['button']);

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'button'     => $button,
            'in_menu'    => $options['in_menu'],
            'items'      => $items,
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
