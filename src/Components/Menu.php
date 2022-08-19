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

class Menu extends Component {
    protected string $component = 'components/menu';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
        'dark'       => false, // Dark menu.
        'brand'      => ['title' => '', 'link' => '#'], // Site name.
    ];

    /**
     * Render menu.
     *
     * @param string                   $id      The ID of Menu.
     * @param array<int|string, mixed> $items   Multidimensional array.
     * @param array<string, mixed>     $options Additional options.
     *
     * @return Component
     */
    public function render(string $id, array $items, array $options = []): Component {
        $this->options($options);

        // Move right items to the end of the array
        if (!empty($items['right'])) {
            $right = $items['right'];
            unset($items['right']);
            $items['right'] = $right;
        }

        return $this->tplData([
            'id'    => $id,
            'items' => $this->items($items, $id, $this->options['dark']),
        ]);
    }

    /**
     * @param array<int|string, mixed> $items
     * @param bool                     $dark
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
        ])->toHtml();
    }

    /**
     * @param array<int|string, mixed> $items
     * @param string                   $id
     * @param bool                     $dark
     *
     * @return array<int|string, mixed>
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
