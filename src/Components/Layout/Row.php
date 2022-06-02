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
    protected string $component = 'layout/row';

    protected array $options = [
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'open'       => false, // Opening div. @internal
        'close'      => false, // Closing div. @internal
    ];

    /**
     * Render row.
     *
     * @param array $options Additional options.
     *
     * @return object
     */
    public function render(array $options = []): object {
        $this->options($options);

        return $this;
    }

    /**
     * Render opening tag of the row.
     *
     * @param array $options Additional options.
     *
     * @return object
     */
    public function open(array $options = []): object {
        return $this->render(array_merge(['open' => true], $options));
    }

    /**
     * Render closing tag of the row.
     *
     * @return string
     */
    public function close(): string {
        return $this->render()->options(['close' => true])->toHtml();
    }
}
