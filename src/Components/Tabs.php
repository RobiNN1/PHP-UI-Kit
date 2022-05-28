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

final class Tabs extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/tabs';

    /**
     * Render tabs.
     *
     * @param string $id      The ID of Tabs.
     * @param array  $items   Multidimensional array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $id, array $items, array $options = []): string {
        $this->options = array_merge([
            'class'          => '', // Class for wrapper.
            'attributes'     => [], // Array of custom attributes.
            'nav_item_class' => '', // Class for nav item.
            'tab_item_class' => '', // Class for tab item.
        ], $options);

        return $this->tpl([
            'id'    => $id,
            'items' => $this->items($items),
        ]);
    }

    /**
     * @param array $items
     *
     * @return array
     */
    private function items(array $items): array {
        // Add 'active' item if missing
        foreach ($items as $key => $item) {
            if (empty($item['active'])) {
                $items[$key]['active'] = false;
            }
        }

        $active_tab = array_search(true, array_column($items, 'active'), true);
        $active_tab = !empty($active_tab) ? $active_tab : 0;

        $items_ = [];
        $i = 0;
        foreach ($items as $key => $content) {
            $items_[$key] = [
                'title'   => $content['title'],
                'content' => $content['content'],
                'active'  => $active_tab === $i,
            ];

            $i++;
        }

        return $items_;
    }
}
