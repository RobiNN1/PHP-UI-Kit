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
     * @param array<int, mixed>    $col_sizes Column sizes.
     * @param array<string, mixed> $options   Additional options.
     *
     * @return Component
     */
    public function render(array $col_sizes = [100], array $options = []): Component {
        $this->options($options);

        $grid_function = $this->uikit->getFrameworkOptions('grid_func');

        return $this->tplData([
            'grid_class' => is_callable($grid_function) ? $grid_function($col_sizes) : '',
        ]);
    }

    /**
     * Render opening tag of the grid.
     *
     * @param array<int, mixed>    $col_sizes Column sizes.
     * @param array<string, mixed> $options   Additional options.
     *
     * @return Component
     */
    public function open(array $col_sizes = [100], array $options = []): Component {
        return $this->render($col_sizes, array_merge(['open' => true], $options));
    }

    /**
     * Render closing tag of the grid.
     *
     * @return string
     */
    public function close(): string {
        return $this->render()->options(['close' => true])->toHtml();
    }
}
