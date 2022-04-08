<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Components;

class Modal extends Component {
    /**
     * Render modal.
     *
     * @param string $id      The ID of Modal.
     * @param array  $content Associative array.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $id, array $content, array $options = []): string {
        $component = 'modal';

        $options = array_merge([
            'class'        => '', // Class for wrapper.
            'attributes'   => [], // Array of custom attributes.
            'size'         => 'default', // Modal size. Possible value: default/sm/lg/fullscreen
            'button'       => [], // Button options.
            'hide_button'  => false, // Hide trigger button.
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

        return $this->uikit->renderTpl('components/'.$component, [
            'id'           => $id,
            'content'      => $content,
            'class'        => $options['class'],
            'attributes'   => $this->getAttributes($options['attributes']),
            'size'         => $this->getOption('sizes', $options['size'], $fwoptions),
            'close_button' => $options['close_button'],
            'hide_button'  => $options['hide_button'],
            'always_open'  => $options['always_open'],
            'button'       => $button,
        ]);
    }
}
