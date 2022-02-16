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

        if (!$this->checkComponent('dropdown')) {
            return $this->noComponentMsg($component, 'dropdown');
        } else if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'color'      => 'light', // Menu color. Possible value: light|dark
            'brand'      => ['title' => '', 'link' => '#'], // Site name.
        ], $options);

        // move right items to the end of array
        if (!empty($items['right'])) {
            $right = $items['right'];
            unset($items['right']);
            $items['right'] = $right;
        }

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'color'      => $this->getOption('colors', $options['color'], $fwoptions),
            'brand'      => $options['brand'],
            'items'      => $this->formatItems($items, $id),
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }

    /**
     * @param string $id
     * @param array  $items
     *
     * @return string
     */
    private function dropdown(string $id, array $items): string {
        $title = $items['title'];
        array_shift($items);

        return $this->uikit->dropdown->render($id, $title, $items, ['in_menu' => true, 'button' => ['menu_dp' => true, 'link' => '#']]);
    }

    /**
     * @param array  $items
     * @param string $id
     *
     * @return array
     */
    private function formatItems(array $items, string $id): array {
        $items_formatted = [];

        foreach ($items as $key => $item) {
            if ($key == 'right') {
                $items_formatted[$key] = $this->formatItems($item, $id);
            } else if (is_array($item) && count($item) !== count($item, COUNT_RECURSIVE)) {
                $items_formatted[$key]['dropdown'] = $this->dropdown('menudp'.$id, $item);
            } else {
                $items_formatted[$key] = $item;
            }
        }

        return $items_formatted;
    }
}