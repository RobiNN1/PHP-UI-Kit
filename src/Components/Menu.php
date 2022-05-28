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

final class Menu extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/menu';

    /**
     * Render menu.
     *
     * @param string $id      The ID of Menu.
     * @param array  $items   Multidimensional array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $id, array $items, array $options = []): string {
        $this->options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'dark'       => false, // Dark menu.
            'brand'      => ['title' => '', 'link' => '#'], // Site name.
        ], $options);

        // Move right items to the end of the array
        if (!empty($items['right'])) {
            $right = $items['right'];
            unset($items['right']);
            $items['right'] = $right;
        }

        return $this->tpl([
            'id'         => $id,
            'items'      => $this->items($items, $id, $this->options['dark']),
            'attributes' => $this->getAttributes($this->options['attributes']),
        ]);
    }

    /**
     * @param array $items
     * @param bool  $dark
     *
     * @return string
     */
    private function dropdown(array $items, bool $dark): string {
        $title = $items['title'];
        array_shift($items);

        return $this->uikit->dropdown->render($title, $items, [
            'dark'    => $dark,
            'button'  => [
                'menu_dp' => true,
                'link'    => '#',
            ],
            'in_menu' => true,
        ]);
    }

    /**
     * @param array  $items
     * @param string $id
     * @param bool   $dark
     *
     * @return array
     */
    private function items(array $items, string $id, bool $dark): array {
        $items_formatted = [];

        foreach ($items as $key => $item) {
            if ($key === 'right') {
                $items_formatted[$key] = $this->items($item, $id, $dark);
            } elseif (is_array($item) && count($item) !== count($item, COUNT_RECURSIVE)) {
                $items_formatted[$key]['dropdown'] = $this->dropdown($item, $dark);
            } else {
                $items_formatted[$key] = $item;
            }
        }

        return $items_formatted;
    }
}
