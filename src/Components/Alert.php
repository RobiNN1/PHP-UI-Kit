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

class Alert extends Component {
    /**
     * @param string $text    Alert text.
     * @param string $color   Alert color. Possible value: default|success|warning|error|info
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $text, string $color = 'default', array $options = []): string {
        $component = 'alert';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
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

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($attributes),
            'text'       => $text,
            'color'      => $this->uikit->getOption('colors', $color, $fwoptions),
            'dismiss'    => $options['dismiss']
        ];

        $html = $this->uikit->renderTpl('components/'.$component, $context);

        $dom = new Dom($html);

        if (!empty($fwoptions['classes']['a'])) {
            $dom->setAttr('a', 'class', $fwoptions['classes']['a']);
        }

        return $dom->save();
    }
}
