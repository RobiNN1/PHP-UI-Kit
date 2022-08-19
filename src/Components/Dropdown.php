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
    protected string $component = 'components/dropdown';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Dropdown ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
        'dark'       => false, // Dark dropdown.
        'button'     => [], // Button options.
        'in_menu'    => false, // Set true if is used in the menu item. @internal
    ];

    /**
     * Render dropdown.
     *
     * @param string               $title   Button title.
     * @param array<int, mixed>    $items   Multidimensional array.
     * @param array<string, mixed> $options Additional options.
     *
     * @return Component
     */
    public function render(string $title, array $items, array $options = []): Component {
        $this->options($options);

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

        return $this->tplData([
            'items'  => $items,
            'button' => $this->uikit->button->render($title, 'button', $this->options['button'])->toHtml(),
        ]);
    }
}
