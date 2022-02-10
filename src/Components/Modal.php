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

class Modal extends Component {
    /**
     * @param string $id      The ID of Modal.
     * @param array  $content Associative array. E.g. ['Title 1' => 'Content 1', 'Title 2' => 'Content 2',]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $id, array $content, array $options = []): string {
        $component = 'modal';

        if (!$this->checkComponent('button')) {
            return $this->noComponentMsg($component, 'button');
        } else if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'class'        => '', // Class for wrapper.
            'attributes'   => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'size'         => 'default', // Button size. Possible value: default|sm|lg|fullscreen
            'hide_button'  => false,
            'button'       => [], // Button options.
            'close_button' => true, // Show close button.
            'always_open'  => false, // Always open.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        if (!empty($options['button'])) {
            if (!empty($fwoptions['button']['attributes'])) {
                foreach ($fwoptions['button']['attributes'] as $attr => $value) {
                    $fwoptions['button']['attributes'][$attr] = strtr($value, ['{id}' => $id]);
                }

                $attr = !empty($options['button']['attributes']) ? $options['button']['attributes'] : [];
                $options['button']['attributes'] = array_merge($attr, $fwoptions['button']['attributes']);
            }

            $button = $this->uikit->button->render($options['button']['title'], 'button', $options['button']);
        } else {
            $button = '';
            $options['always_open'] = true;
            $options['hide_button'] = true;
        }

        $context = [
            'id'           => $id,
            'class'        => $options['class'],
            'attributes'   => $this->getAttributes($options['attributes']),
            'size'         => $this->uikit->getOption('sizes', $options['size'], $fwoptions),
            'content'      => $content,
            'close_button' => $options['close_button'],
            'always_open'  => $options['always_open'],
            'hide_button'  => $options['hide_button'],
            'button'       => $button,
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
