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

final class Grid extends Component {
    /**
     * @var string
     */
    protected string $component = 'layout/grid';

    /**
     * Render grid.
     *
     * @param array $col_sizes Column sizes.
     * @param array $options   Additional options.
     *
     * @return string
     */
    public function render(array $col_sizes = [100], array $options = []): string {
        $this->options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'open'       => false, // Opening div. @internal
            'close'      => false, // Closing div. @internal
        ], $options);

        $grid_function = $this->uikit->getFrameworkOptions('grid_func');

        return $this->tpl([
            'grid_class' => is_callable($grid_function) ? $grid_function($col_sizes) : '',
            'attributes' => $this->getAttributes($this->options['attributes']),
        ]);
    }

    /**
     * Render opening tag of the grid.
     *
     * @param array $col_sizes Column sizes.
     * @param array $options   Additional options.
     *
     * @return string
     */
    public function open(array $col_sizes = [100], array $options = []): string {
        return $this->render($col_sizes, array_merge(['open' => true], $options));
    }

    /**
     * Render closing tag of the grid.
     *
     * @return string
     */
    public function close(): string {
        return $this->render([], ['close' => true]);
    }
}
