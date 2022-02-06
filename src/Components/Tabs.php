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
     * @param string $id      The ID of Tabs.
     * @param array  $items   Multidimensional array. E.g. [['title' => 'Tab 1', 'content' => 'Content 1'], ['title' => 'Tab 2', 'content' => 'Content 2'],]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $id, array $items, array $options = []): string {
        $component = 'tabs';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [] // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
        ], $options);

        foreach ($items as $key => $item) {
            if (empty($item['active'])) {
                $items[$key]['active'] = false;
            }
        }

        $active_tab = array_search(true, array_column($items, 'active'));
        $active_tab = !empty($active_tab) ? $active_tab : 0;

        $items_ = [];
        foreach ($items as $key => $content) {
            $items_[] = [
                'title'   => $content['title'],
                'content' => $content['content'],
                'active'  => $active_tab === $key
            ];
        }

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'items'      => $items_
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
