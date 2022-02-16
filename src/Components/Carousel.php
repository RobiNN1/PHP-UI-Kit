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
     * @param string $id      The ID of Carousel.
     * @param array  $slides  Array. E.g. ['Slide 1', 'Slide 2',]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $id, array $slides, array $options = []): string {
        $component = 'carousel';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'indicators' => true, // Carousel indicators.
            'controls'   => true, // Carousel controls buttons.
        ], $options);

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'slides'     => $slides,
            'indicators' => $options['indicators'],
            'controls'   => $options['controls'],
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
