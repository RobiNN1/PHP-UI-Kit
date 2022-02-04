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

use RobiNN\UiKit\Dom;
use RobiNN\UiKit\UiKit;

class Alert {
    /**
     * @param UiKit  $uikit
     * @param string $text    Alert text.
     * @param string $color   Alert color. Possible value: default|success|warning|error|info
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $text, string $color = 'default', array $options = []): string {
        $component = 'alert';

        if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Alert ID.
            'class'      => '', // Alert class.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'dismiss'    => false // Make alert dismissable.
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
            'dismiss'    => $options['dismiss']
        ];

        $html = $uikit->render('components/'.$component, $context);

        $dom = new Dom($html);

        if (!empty($fwoptions['classes']['a'])) {
            $dom->setAttr('a', 'class', $fwoptions['classes']['a']);
        }

        return $dom->save();
    }
}
