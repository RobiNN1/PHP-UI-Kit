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

use RobiNN\UiKit\Component;

class Breadcrumbs extends Component {
    /**
     * @param array $links   Associative array. E.g. ['Link 1' => 'link1.php', 'Link 2' => 'link2.php',]
     * @param array $options Additional options. Default value: []
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
            'item_class' => '', // Class for item.
            'attributes' => [] // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        $attributes += $options['attributes'];

        $context = [
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $this->getAttributes($attributes),
            'links'      => $links
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
