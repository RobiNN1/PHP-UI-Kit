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
    /**
     * @var string
     */
    protected string $component = 'components/list_group';

    /**
     * Render a list group.
     *
     * @param array $items   Array of items.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $items, array $options = []): string {
        $this->options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
        ], $options);

        return $this->tpl([
            'items'      => $items,
            'attributes' => $this->getAttributes($this->options['attributes'], $this->options['id']),
        ]);
    }
}
