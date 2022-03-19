<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components\Layout;

use RobiNN\UiKit\Components\Component;

class Grid extends Component {
    /**
     * Render grid.
     *
     * @param array|string $col_sizes Column sizes.
     * @param array        $options   Additional options.
     *
     * @return string
     */
    public function render(array|string $col_sizes = [100], array $options = []): string {
        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'open'       => false, // Opening div. @internal
            'close'      => false, // Closing div. @internal
        ], $options);

        $grid_function = $this->uikit->getFrameworkOptions('grid_func');

        return $this->uikit->renderTpl('layout/grid', [
            'grid_class' => is_callable($grid_function) ? $grid_function($col_sizes) : '',
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'open'       => $options['open'],
            'close'      => $options['close'],
        ]);
    }

    /**
     * Render opening tag of the grid.
     *
     * @param array|string $col_sizes Column sizes.
     * @param array        $options   Additional options.
     *
     * @return string
     */
    public function open(array|string $col_sizes = [100], array $options = []): string {
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
