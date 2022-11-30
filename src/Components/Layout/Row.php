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

class Row extends Component {
    protected string $component = 'layout/row';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'open'       => false, // Opening div. @internal
        'close'      => false, // Closing div. @internal
    ];

    /**
     * Render row.
     *
     * @param array<string, mixed> $options Additional options.
     */
    public function render(array $options = []): Component {
        $this->options($options);

        return $this;
    }

    /**
     * Render opening tag of the row.
     *
     * @param array<string, mixed> $options Additional options.
     */
    public function open(array $options = []): Component {
        return $this->render([...['open' => true], ...$options]);
    }

    /**
     * Render closing tag of the row.
     */
    public function close(): string {
        return $this->render()->options(['close' => true])->__toString();
    }
}
