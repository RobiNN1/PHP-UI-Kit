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

class Pagination extends Component {
    /**
     * Render pagination.
     *
     * @param array $items   Array of items.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $items, array $options = []): string {
        $component = 'pagination';

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'link'       => '', // Pagination link tpl, use %s placeholder for numbers.
            'current'    => 1, // Current active page.
            'disabled'   => 0, // Disabled page.
            'prev_next'  => true, // Enable Previous and Next links.
            'prev_title' => '&laquo;', // Previous page link title.
            'next_title' => '&raquo;', // Next page link title.
        ], $options);

        $prev = [];
        $next = [];
        if ($options['prev_next']) {
            $prev['prev'] = $options['current'] > 1 ? $options['current'] - 1 : $options['current'];
            $next['next'] = $options['current'] + 1;
        }

        $items = $prev + $items + $next;

        foreach ($items as $key => $item) {
            $prev = $key === 'prev' ? $options['prev_title'] : null;
            $next = $key === 'next' ? $options['next_title'] : null;
            $disabled_prev_next = ($options['disabled'] == 'prev' && $key === 'prev') || ($options['disabled'] == 'next' && $key === 'next');

            $items[$key] = [
                'link'     => sprintf($options['link'], $item),
                'title'    => $prev ?: ($next ?: $item),
                'current'  => !($key === 'prev' || $key === 'next') && $item === $options['current'],
                'disabled' => $item === $options['disabled'] || $disabled_prev_next,
            ];
        }

        return $this->uikit->renderTpl('components/'.$component, [
            'items'      => $items,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'item_class' => $options['item_class'],
        ]);
    }
}
