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

use RobiNN\UiKit\UiKit;

class Modal {
    /**
     * @param UiKit  $uikit
     * @param string $id      The ID of Modal.
     * @param array  $content Associative array. E.g. ['Title 1' => 'Content 1', 'Title 2' => 'Content 2',]
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $id, array $content, array $options = []): string {
        $component = 'modal';

        if (!$uikit->checkComponent('button')) {
            return $uikit->noComponentMsg($component, 'button');
        } else if (!$uikit->checkComponent($component)) {
            return $uikit->noComponentMsg($component);
        }

        $options = array_merge([
            'class'        => '', // Class for wrapper.
            'attributes'   => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'size'         => 'default', // Button size. Possible value: default|sm|lg|fullscreen
            'hide_button'  => false,
            'button'       => [], // Button options.
            'close_button' => true, // Show close button.
            'always_open'  => false // Always open.
        ], $options);

        $fwoptions = $uikit->getFrameworkOptions($component);

        if (!empty($fwoptions['button']['attributes'])) {
            foreach ($fwoptions['button']['attributes'] as $attr => $value) {
                $fwoptions['button']['attributes'][$attr] = strtr($value, ['{id}' => $id]);
            }

            $attr = !empty($options['button']['attributes']) ? $options['button']['attributes'] : [];
            $options['button']['attributes'] = array_merge($attr, $fwoptions['button']['attributes']);
        }

        $button = Button::render($uikit, $options['button']['title'], 'button', $options['button']);

        $context = [
            'id'           => $id,
            'class'        => $options['class'],
            'attributes'   => $uikit->getAttributes($options['attributes']),
            'size'         => $uikit->getOption('sizes', $options['size'], $fwoptions),
            'content'      => $content,
            'close_button' => $options['close_button'],
            'always_open'  => $options['always_open'],
            'hide_button'  => $options['hide_button'],
            'button'       => $button
        ];

        return $uikit->render('components/'.$component, $context);
    }
}
