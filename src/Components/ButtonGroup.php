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

use RobiNN\UiKit\Misc;

class ButtonGroup extends Component {
    /**
     * Render button group.
     *
     * @param array $items   Associative array or multidimensional array.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $items, array $options = []): string {
        $component = 'button_group';

        if (!$this->checkComponent('button')) {
            return $this->noComponentMsg($component, 'button');
        } else if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'size'       => 'default', // Button group size. Possible value: default/sm/lg
            'type'       => 'button', // Default type for all buttons. Possible value: button/submit/reset
            'item_class' => '', // Class for item.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $size = '';
        if (!empty($fwoptions['sizes'])) {
            $size = $this->getOption('sizes', $options['size'], $fwoptions);
        }

        $buttons = [];

        foreach ($items as $value => $button) {
            $title = $button;
            $type = $options['type'];
            $btn_options = [];

            if (is_array($button)) {
                $title = $button['title'];

                if (!empty($button['type'])) {
                    $type = $button['type'];
                }

                if (!empty($button['btn_options'])) {
                    $btn_options = $button['btn_options'];
                }

                $value = array_key_exists('value', $button) ? $button['value'] :
                    (array_key_exists('value', $btn_options) ? $btn_options['value'] : $value);
            }

            $btn_options['class'] = $options['item_class'].(!empty($btn_options['class']) ? Misc::space($btn_options['class']) : '');

            $btn = [
                'value' => $value,
                'link'  => !empty($button['link']) ? $button['link'] : '',
            ];

            $buttons[] = $this->uikit->button->render($title, $type, array_merge($btn, $btn_options));
        }

        return $this->uikit->renderTpl('components/'.$component, [
            'buttons'    => $buttons,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'size'       => $size,
        ]);
    }
}
