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

class Badge extends Component {
    /**
     * Render badge.
     *
     * @param string $text    Badge text.
     * @param string $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $text, string $color = 'default', array $options = []): string {
        $component = 'badge';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Badge ID.
            'class'      => '', // Badge class.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value.
            'rounded'    => false, // Rounded badge.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        return $this->uikit->renderTpl('components/'.$component, [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'text'       => $text,
            'color'      => $this->getOption('colors', $color, $fwoptions),
            'rounded'    => $options['rounded'],
        ]);
    }
}
