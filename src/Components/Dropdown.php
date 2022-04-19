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

class Dropdown extends Component {
    /**
     * Render dropdown.
     *
     * @param string $title   Button title.
     * @param array  $items   Multidimensional array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $title, array $items, array $options = []): string {
        $component = 'dropdown';

        $options = array_merge([
            'id'         => '', // Dropdown ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'button'     => [], // Button options.
            'in_menu'    => false, // Set true if is used in the menu item. @internal
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

        if (!empty($fwoptions['button']['icon'])) {
            $title .= ' '.$fwoptions['button']['icon'];
        }

        $button = $this->uikit->button->render($title, 'button', $options['button']);

        return $this->uikit->renderTpl('components/'.$component, [
            'items'      => $items,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'item_class' => $options['item_class'],
            'in_menu'    => $options['in_menu'],
            'button'     => $button,
        ]);
    }
}
