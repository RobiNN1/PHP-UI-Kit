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
     * Render alert.
     *
     * @param string $text    Alert text.
     * @param string $color   Alert color. Possible value: default|success|warning|error|info
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $text, string $color = 'default', array $options = []): string {
        $component = 'alert';

        $options = array_merge([
            'id'         => '', // Alert ID.
            'class'      => '', // Alert class.
            'attributes' => [], // Array of custom attributes.
            'dismiss'    => false, // Make alert dismissable.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $html = $this->uikit->renderTpl('components/'.$component, [
            'text'       => $text,
            'color'      => $this->getOption('colors', $color, $fwoptions),
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'dismiss'    => $options['dismiss'],
        ]);

        $dom = new Dom($html);

        if (!empty($fwoptions['classes']['a'])) {
            $dom->setAttr('a', 'class', $fwoptions['classes']['a']);
        }

        return $dom->save();
    }
}
