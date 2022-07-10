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

final class ListGroup extends Component {
    protected string $component = 'components/list_group';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Wrapper ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
    ];

    /**
     * Render a list group.
     *
     * @param array<int, string>   $items   Array of items.
     * @param array<string, mixed> $options Additional options.
     *
     * @return object
     */
    public function render(array $items, array $options = []): object {
        $this->options($options);

        return $this->tplData([
            'items' => $items,
        ]);
    }
}
