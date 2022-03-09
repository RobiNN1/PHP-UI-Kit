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

class Breadcrumbs extends Component {
    /**
     * Render breadcrumbs.
     *
     * @param array $links   Associative array.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $links, array $options = []): string {
        $component = 'breadcrumbs';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
        ], $options);

        return $this->uikit->renderTpl('components/'.$component, [
            'links'      => $links,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'item_class' => $options['item_class'],
        ]);
    }
}
