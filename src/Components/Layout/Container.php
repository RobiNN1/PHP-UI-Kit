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

namespace RobiNN\UiKit\Components\Layout;

use RobiNN\UiKit\Components\Component;

class Container extends Component {
    /**
     * Render container.
     *
     * @param bool  $fluid   Container without maximum width.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(bool $fluid = false, array $options = []): string {
        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'open'       => false, // Opening div. @internal
            'close'      => false, // Closing div. @internal
        ], $options);

        return $this->uikit->render('layout/container', [
            'fluid'      => $fluid,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'open'       => $options['open'],
            'close'      => $options['close'],
        ]);
    }

    /**
     * Render opening tag of the container.
     *
     * @param bool  $fluid   Container without maximum width.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function open(bool $fluid = false, array $options = []): string {
        return $this->render($fluid, array_merge(['open' => true], $options));
    }

    /**
     * Render closing tag of the container.
     *
     * @return string
     */
    public function close(): string {
        return $this->render(false, ['close' => true]);
    }
}
