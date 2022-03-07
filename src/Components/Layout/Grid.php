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
    public function render($col_sizes = [100], array $options = []): string {
        // $col_sizes example values:
        // [100, 50] - 100% of width on mobile, 50% on larger screen. Depending on framework, you can add multiple values however recommended maximum is 4 values.
        // [100, 50, ['bootstrap5' => 'col-6'] - You can even specify a value for a specific framework, in this case the first and second values are ignored.
        // 'auto' - Columns will have the same width. Not recommended for layouts that must support multiple css frameworks. Since not every framework support this.

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value.
            'open'       => false, // Opening div
            'close'      => false, // Closing div
        ], $options);

        $grid_function = $this->uikit->getFrameworkOptions('grid_func');

        return $this->uikit->renderTpl('layout/grid', [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'grid_class' => is_callable($grid_function) ? $grid_function($col_sizes) : '',
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
    public function open($col_sizes = [100], array $options = []): string {
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
