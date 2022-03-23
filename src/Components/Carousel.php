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

class Carousel extends Component {
    /**
     * Render carousel.
     *
     * @param string $id      Carousel ID.
     * @param array  $slides  Array of items.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $id, array $slides, array $options = []): string {
        $component = 'carousel';

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'indicators' => true, // Carousel indicators.
            'controls'   => true, // Carousel controls buttons.
        ], $options);

        return $this->uikit->renderTpl('components/'.$component, [
            'id'         => $id,
            'slides'     => $slides,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'item_class' => $options['item_class'],
            'indicators' => $options['indicators'],
            'controls'   => $options['controls'],
        ]);
    }
}
