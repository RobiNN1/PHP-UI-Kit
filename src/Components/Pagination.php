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

class Pagination extends Component {
    /**
     * @param array $items   Array of items.
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(array $items, array $options = []): string {
        $component = 'pagination';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'link'       => '', // Pagination link tpl, use {p} placeholder for numbers.
            'current'    => 4, // Current page.
            'disabled'   => null, // Disabled page. Prev or next can be disabled as well.
            'prev_next'  => true, // Enable Previous and Next links.
            'prev_title' => '&laquo;', // Previous page link title.
            'next_title' => '&raquo;', // Next page link title.
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        $attributes += $options['attributes'];

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
                'link'     => str_replace('{p}', $item, $options['link']),
                'title'    => $prev ?: ($next ?: $item),
                'current'  => !($key === 'prev' || $key === 'next') && $item === $options['current'],
                'disabled' => $item === $options['disabled'] || $disabled_prev_next,
            ];
        }

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($attributes),
            'items'      => $items,
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
