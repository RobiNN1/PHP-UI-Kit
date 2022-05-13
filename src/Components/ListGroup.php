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
    /**
     * Render a list group.
     *
     * @param array $items   Array of items.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $items, array $options = []): string {
        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
        ], $options);

        return $this->uikit->render('components/list_group', [
            'items'      => $items,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'item_class' => $options['item_class'],
        ]);
    }
}
