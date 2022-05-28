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

final class Modal extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/modal';

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
        $this->options = array_merge([
            'class'        => '', // Class for wrapper.
            'attributes'   => [], // Array of custom attributes.
            'size'         => 'default', // Modal size. Possible value: default/sm/lg/fullscreen
            'button'       => [], // Button options.
            'hide_button'  => false, // Hide trigger button.
            'close_button' => true, // Show close button.
            'always_open'  => false, // Always open.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions('modal.button');

        if (!empty($this->options['button'])) {
            if (!empty($fwoptions['attributes'])) {
                foreach ($fwoptions['attributes'] as $attr => $value) {
                    $fwoptions['attributes'][$attr] = strtr($value, ['{id}' => $id]);
                }

                $attr = !empty($this->options['button']['attributes']) ? $this->options['button']['attributes'] : [];
                $this->options['button']['attributes'] = array_merge($attr, $fwoptions['attributes']);
            }

            $button = $this->uikit->button->render($this->options['button']['title'], 'button', $this->options['button']);
        } else {
            $button = '';
            $this->options['always_open'] = true;
            $this->options['hide_button'] = true;
        }

        return $this->tpl([
            'id'      => $id,
            'content' => $content,
            'size'    => $this->getOption('sizes', $this->options['size']),
            'button'  => $button,
        ]);
    }
}
