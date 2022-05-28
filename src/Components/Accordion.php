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

final class Accordion extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/accordion';

    /**
     * Render accordion.
     *
     * @param string $id      Accordion ID.
     * @param array  $items   Associative array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $id, array $items, array $options = []): string {
        $this->options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'first_open' => true, // Set false to close first item.
        ], $options);

        return $this->tpl([
            'id'    => $id,
            'items' => $items,
        ]);
    }
}
