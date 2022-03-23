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

class Tabs extends Component {
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
        $component = 'tabs';

        $options = array_merge([
            'class'          => '', // Class for wrapper.
            'attributes'     => [], // Array of custom attributes.
            'nav_item_class' => '', // Class for nav item.
            'tab_item_class' => '', // Class for tab item.
        ], $options);

        // Add 'active' item if missing
        foreach ($items as $key => $item) {
            if (empty($item['active'])) {
                $items[$key]['active'] = false;
            }
        }

        $active_tab = array_search(true, array_column($items, 'active'));
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

        return $this->uikit->renderTpl('components/'.$component, [
            'id'             => $id,
            'items'          => $items_,
            'class'          => $options['class'],
            'attributes'     => $this->getAttributes($options['attributes']),
            'nav_item_class' => $options['nav_item_class'],
            'tab_item_class' => $options['tab_item_class'],
        ]);
    }
}
