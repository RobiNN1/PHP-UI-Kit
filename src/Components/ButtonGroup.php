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

class ButtonGroup extends Component {
    /**
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(array $options = []): string {
        $component = 'button_group';

        if (!$this->checkComponent('button')) {
            return $this->noComponentMsg($component, 'button');
        } else if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'options'    => [], // Array of buttons. E.g. [0 => 'Button 1', 1 => ['title' => 'Button 2', 'btn_options' => ['color' => 'error']]]
            'size'       => 'default', // Button size, this sets the same for all buttons. Possible value: default|sm|lg
            'type'       => 'button' // Button type, this sets the same for all buttons. Possible value: button|submit|reset
        ], $options);

        $attributes = [];

        if (!empty($options['id'])) {
            $attributes['id'] = $options['id'];
        }

        $attributes += $options['attributes'];

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $size = '';
        if (!empty($fwoptions['sizes'])) {
            $size = $this->uikit->getOption('sizes', $options['size'], $fwoptions);
        }

        $buttons = [];

        if (!empty($options['options']) && is_array($options['options'])) {
            foreach ($options['options'] as $value => $button) {
                $title = $button;
                $type = $options['type'];
                $btn_options = [];

                if (is_array($button)) {
                    $title = $button['title'];
                    if (!empty($button['type'])) {
                        $type = $button['type'];
                    }
                    $btn_options = $button['btn_options'];
                }

                $btn = [
                    'value' => $value,
                    'link'  => !empty($button['link']) ? $button['link'] : '',
                    'size'  => empty($size) ? $options['size'] : ''
                ];

                $buttons[] = $this->uikit->button->render($title, $type, array_merge($btn, $btn_options));
            }
        }

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($attributes),
            'size'       => $size,
            'buttons'    => $buttons
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
