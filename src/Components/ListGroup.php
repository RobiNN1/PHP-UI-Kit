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

class ListGroup extends Component {
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
     * @param array<int, array<string, bool|string>|string> $items   Array of items or multidimensional array.
     * @param array<string, mixed>                          $options Additional options.
     */
    public function render(array $items, array $options = []): Component {
        $this->options($options);

        return $this->setTplData([
            'items' => $items,
        ]);
    }
}
