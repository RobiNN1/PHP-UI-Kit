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

final class Dropdown extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/dropdown';

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
        $this->options = array_merge([
            'id'         => '', // Dropdown ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'dark'       => false, // Dark dropdown.
            'button'     => [], // Button options.
            'in_menu'    => false, // Set true if is used in the menu item. @internal
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions('dropdown.button');

        if (!empty($fwoptions['class'])) {
            $class = !empty($this->options['button']['class']) ? $this->options['button']['class'].' ' : '';
            $this->options['button']['class'] = $class.$fwoptions['class'];
        }

        if (!empty($fwoptions['attributes'])) {
            $attr = !empty($this->options['button']['attributes']) ? $this->options['button']['attributes'] : [];
            $this->options['button']['attributes'] = array_merge($attr, $fwoptions['attributes']);
        }

        if (!empty($fwoptions['icon'])) {
            $title .= ' '.$fwoptions['icon'];
        }

        return $this->tpl([
            'items'      => $items,
            'attributes' => $this->getAttributes($this->options['attributes'], $this->options['id']),
            'button'     => $this->uikit->button->render($title, 'button', $this->options['button']),
        ]);
    }
}
