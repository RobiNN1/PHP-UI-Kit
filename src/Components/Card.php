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

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $html = $this->uikit->renderTpl('components/'.$component, [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'top_img'    => $options['top_img'],
            'header'     => $options['header'],
            'top'        => $options['top'],
            'body'       => $options['body'],
            'bottom'     => $options['bottom'],
            'footer'     => $options['footer'],
        ]);

        $dom = new Dom($html);

        if (!empty($fwoptions['classes']['p'])) {
            $dom->setAttr('p', 'class', $fwoptions['classes']['p']);
        }

        preg_match_all("#<(h[2-6])>(.*?)</\\1>#", $html, $titles);
        if (!empty($titles[1])) {
            foreach ($titles[1] as $key => $h) {
                if ($key === 0) {
                    if (!empty($fwoptions['classes']['title'])) {
                        $dom->setAttr($h, 'class', $fwoptions['classes']['title']);
                    }
                } else if ($key === 1) {
                    if (!empty($fwoptions['classes']['subtitle'])) {
                        $dom->setAttr($h, 'class', $fwoptions['classes']['subtitle']);
                    }
                }
            }
        }

        return $dom->save();
    }
}
