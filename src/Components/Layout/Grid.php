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

class Grid extends Component {
    protected string $component = 'layout/grid';

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
     * Render grid.
     *
     * @param array<int, int|string> $col_sizes Column sizes.
     * @param array<string, mixed>   $options   Additional options.
     */
    public function render(array $col_sizes = [100], array $options = []): Component {
        $this->options($options);

        $grid_function = $this->uikit->getFrameworkOption('grid_func');

        return $this->setTplData([
            'grid_class' => is_callable($grid_function) ? $grid_function($col_sizes) : '',
        ]);
    }

    /**
     * Render opening tag of the grid.
     *
     * @param array<int, int|string> $col_sizes Column sizes.
     * @param array<string, mixed>   $options   Additional options.
     */
    public function open(array $col_sizes = [100], array $options = []): Component {
        return $this->render($col_sizes, [...['open' => true], ...$options]);
    }

    /**
     * Render closing tag of the grid.
     */
    public function close(): string {
        return $this->render()->options(['close' => true])->__toString();
    }
}
