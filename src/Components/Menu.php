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
     */
    public function render(string $id, array $items, array $options = []): Component {
        $this->options($options);

        // Move right items to the end of the array
        if (isset($items['right'])) {
            $right = $items['right'];
            unset($items['right']);
            $items['right'] = $right;
        }

        return $this->setTplData([
            'id'    => $id,
            'items' => $this->items($items, $id, $this->options['dark'], $this->options['item_class']),
        ]);
    }

    /**
     * @param array<string, string> $items
     */
    private function dropdown(array $items, bool $dark, string $item_class): string {
        $title = $items['title'];
        array_shift($items);

        return $this->uikit->dropdown($title, $items, [
            'dark'    => $dark,
            'button'  => [
                'menu_dp' => true,
                'link'    => '#',
            ],
            'in_menu' => true,
            'class'   => $item_class,
        ])->__toString();
    }

    /**
     * @param array<int|string, mixed> $items
     *
     * @return array<int|string, mixed>
     */
    private function items(array $items, string $id, bool $dark, string $item_class): array {
        $items_formatted = [];

        foreach ($items as $key => $item) {
            if ($key === 'right') {
                $items_formatted[$key] = $this->items($item, $id, $dark, $item_class);
            } elseif (is_array($item) && count($item) !== count($item, COUNT_RECURSIVE)) {
                $items_formatted[$key]['dropdown'] = $this->dropdown($item, $dark, $item_class);
            } else {
                $items_formatted[$key] = $item;
            }
        }

        return $items_formatted;
    }
}
