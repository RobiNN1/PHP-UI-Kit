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
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(array $options = []): string {
        $component = 'card';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'top_img'    => [], // Card top image.
            'header'     => '', // Card header.
            'body'       => '', // Card body.
            'footer'     => '', // Card footer.
            'top'        => '', // Card top content.
            'bottom'     => '' // card bottom content.
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
            'top_img'    => $options['top_img'],
            'header'     => $options['header'],
            'body'       => $options['body'],
            'footer'     => $options['footer'],
            'top'        => $options['top'],
            'bottom'     => $options['bottom']
        ];

        $html = $this->uikit->renderTpl('components/'.$component, $context);

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
