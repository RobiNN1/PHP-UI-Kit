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

class Badge {
    /**
     * @param UiKit  $uikit
     * @param string $text    Badge text.
     * @param string $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $text, string $color = 'default', array $options = []): string {
        $component = 'badge';

        if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Badge ID.
            'class'      => '', // Badge class.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'rounded'    => false // Rounded badge.
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        $attributes += $options['attributes'];

        $fwoptions = $uikit->getFrameworkOptions($component);

        $context = [
            'class'      => $options['class'],
            'attributes' => $uikit->getAttributes($attributes),
            'text'       => $text,
            'color'      => $uikit->getOption('colors', $color, $fwoptions),
            'rounded'    => $options['rounded']
        ];

        return $uikit->render('components/'.$component, $context);
    }
}
