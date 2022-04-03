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

class Card extends Component {
    /**
     * Render card.
     *
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $options = []): string {
        $component = 'card';

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'top_img'    => [], // Card top image.
            'header'     => '', // Card header.
            'top'        => '', // Card top content.
            'body'       => '', // Card body.
            'bottom'     => '', // Card bottom content.
            'footer'     => '', // Card footer.
        ], $options);

        return $this->uikit->renderTpl('components/'.$component, [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'top_img'    => $options['top_img'],
            'header'     => $options['header'],
            'top'        => $options['top'],
            'body'       => $options['body'],
            'bottom'     => $options['bottom'],
            'footer'     => $options['footer'],
        ]);
    }
}
