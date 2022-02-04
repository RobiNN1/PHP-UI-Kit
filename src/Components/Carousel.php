<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UiKit\Components;

use UiKit\UiKit;

class Carousel {
    /**
     * @param UiKit  $uikit
     * @param string $id      The ID of Carousel.
     * @param array  $slides  Array. E.g. ['Slide 1', 'Slide 2',]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $id, array $slides, array $options = []): string {
        $component = 'carousel';

        if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'item_class' => '', // Class for item.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'indicators' => true, // Carousel indicators.
            'controls'   => true // Carousel controls buttons.
        ], $options);

        $attributes = [];

        $attributes += $options['attributes'];

        $context = [
            'id'         => $id,
            'class'      => $options['class'],
            'item_class' => $options['item_class'],
            'attributes' => $uikit->getAttributes($attributes),
            'slides'     => $slides,
            'indicators' => $options['indicators'],
            'controls'   => $options['controls']
        ];

        return $uikit->render('components/'.$component, $context);
    }
}
