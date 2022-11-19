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

class Accordion extends Component {
    protected string $component = 'components/accordion';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
        'first_open' => true, // Set false to close first item.
    ];

    /**
     * Render accordion.
     *
     * @param string                $id      Accordion ID.
     * @param array<string, string> $items   Associative array.
     * @param array<string, mixed>  $options Additional options.
     */
    public function render(string $id, array $items, array $options = []): Component {
        $this->options($options);

        return $this->setTplData([
            'id'    => $id,
            'items' => $items,
        ]);
    }
}
