<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Layout;

use RobiNN\UiKit\UiKit;

class Grid {
    /**
     * @param UiKit        $uikit
     * @param array|string $col_sizes Column sizes.
     * @param array        $options   Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, $col_sizes = [100], array $options = []): string {
        // $col_sizes example values:
        // [100, 50] - 100% of width on mobile, 50% on larger screen. Depending on framework, you can add multiple values however recommended maximum is 4 values.
        // [100, 50, ['bootstrap5' => 'col-6'] - You can even specify a value for a specific framework, in this case the first and second values are ignored.
        // 'auto' - Columns will have the same width. Not recommended for layouts that must support multiple css frameworks. Since not every framework support this.

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'open'       => false, // Opening div
            'close'      => false // Closing div
        ], $options);

        $fwoptions = $uikit->getFrameworkOptions('layout');
        $grid = $fwoptions['grid_func']($col_sizes);

        $context = [
            'class'      => $options['class'],
            'attributes' => $uikit->getAttributes($options['attributes']),
            'grid_class' => $grid,
            'open'       => $options['open'],
            'close'      => $options['close']
        ];

        return $uikit->render('layout/grid', $context);
    }
}
