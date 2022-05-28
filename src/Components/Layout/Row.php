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

final class Row extends Component {
    /**
     * @var string
     */
    protected string $component = 'layout/row';

    /**
     * Render row.
     *
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $options = []): string {
        $this->options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'open'       => false, // Opening div. @internal
            'close'      => false, // Closing div. @internal
        ], $options);

        return $this->tpl([
            'attributes' => $this->getAttributes($this->options['attributes']),
        ]);
    }

    /**
     * Render opening tag of the row.
     *
     * @param array $options Additional options.
     *
     * @return string
     */
    public function open(array $options = []): string {
        return $this->render(array_merge(['open' => true], $options));
    }

    /**
     * Render closing tag of the row.
     *
     * @return string
     */
    public function close(): string {
        return $this->render(['close' => true]);
    }
}
