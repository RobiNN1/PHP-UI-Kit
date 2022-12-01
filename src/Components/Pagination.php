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
    protected string $component = 'components/pagination';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Wrapper ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
        'link'       => '', // Pagination link tpl, use %s placeholder for numbers.
        'current'    => 1, // Current active page.
        'disabled'   => 0, // Disabled page. Also, can disable prev and next.
        'prev_next'  => true, // Enable Previous and Next links.
        'prev_title' => '&laquo;', // Previous page link title.
        'next_title' => '&raquo;', // Next page link title.
    ];

    /**
     * Render pagination.
     *
     * @param array<int|string, int|string> $items   Array of items.
     * @param array<string, mixed>          $options Additional options.
     */
    public function render(array $items, array $options = []): Component {
        $this->options($options);

        $prev = [];
        $next = [];

        if ($this->options['prev_next']) {
            $prev['prev'] = $this->options['current'] > 1 ? $this->options['current'] - 1 : $this->options['current'];
            $next['next'] = $this->options['current'] + 1;
        }

        $items = $prev + $items + $next;

        return $this->setTplData([
            'items' => $this->items($items, $this->options),
        ]);
    }

    /**
     * @param array<int|string, mixed> $items
     * @param array<string, mixed>     $options
     *
     * @return array<string|int, mixed>
     */
    private function items(array $items, array $options): array {
        foreach ($items as $key => $item) {
            $prev = $key === 'prev' ? $options['prev_title'] : null;
            $next = $key === 'next' ? $options['next_title'] : null;

            $disabled_prev = $options['disabled'] === 'prev' && $key === 'prev';
            $disabled_next = $options['disabled'] === 'next' && $key === 'next';

            $title = $next ?: $item;

            $items[$key] = [
                'link'     => sprintf($options['link'], $item),
                'title'    => $prev ?: $title,
                'current'  => !($key === 'prev' || $key === 'next') && $item === $options['current'],
                'disabled' => $item === $options['disabled'] || $disabled_prev || $disabled_next,
            ];
        }

        return $items;
    }
}
