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
    protected string $component = 'components/modal';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'class'        => '', // Class for wrapper.
        'attributes'   => [], // Array of custom attributes.
        'size'         => 'default', // Modal size. Possible value: default/sm/lg/fullscreen
        'button'       => [], // Button options.
        'hide_button'  => false, // Hide trigger button.
        'close_button' => true, // Show close button.
        'always_open'  => false, // Always open.
    ];

    /**
     * Render modal.
     *
     * @param string                $id      The ID of Modal.
     * @param array<string, string> $content Associative array.
     * @param array<string, mixed>  $options Additional options.
     *
     * @return object
     */
    public function render(string $id, array $content, array $options = []): object {
        $this->options($options);

        $fwoptions = $this->uikit->getFrameworkOptions('modal.button');

        if (!empty($this->options['button'])) {
            if (!empty($fwoptions['attributes'])) {
                foreach ($fwoptions['attributes'] as $attr => $value) {
                    $fwoptions['attributes'][$attr] = strtr($value, ['{id}' => $id]);
                }

                $attr = !empty($this->options['button']['attributes']) ? $this->options['button']['attributes'] : [];
                $this->options['button']['attributes'] = array_merge($attr, $fwoptions['attributes']);
            }

            $button = $this->uikit->button->render($this->options['button']['title'], 'button', $this->options['button'])->toHtml();
        } else {
            $button = '';
            $this->options['always_open'] = true;
            $this->options['hide_button'] = true;
        }

        return $this->tplData([
            'id'      => $id,
            'content' => $content,
            'size'    => $this->getOption('sizes', $this->options['size']),
            'button'  => $button,
        ]);
    }
}
