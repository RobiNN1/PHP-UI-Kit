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

/**
 * Default framework config.
 * If you need to change any value, use the setFrameworkOption() function.
 */
return [
    'jquery'       => true,
    'files'        => [
        'css' => ['https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css'],
        'js'  => ['https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js'],
    ],
    'grid_func'    => static function (array $col_sizes): string {
        $sizes = ['', 'tablet', 'computer', 'large screen'];
        $columns = [];

        foreach ($col_sizes as $index => $value) {
            if ($value === 'auto') {
                return '';
            }

            if (is_array($value) && isset($value['fomanticui2'])) {
                return $value['fomanticui2'] === 'auto' ? '' : $value['fomanticui2'];
            }

            if (!is_array($value) && !empty($sizes[$index])) {
                $column = ($value * 16) / 100;
                $columns[$sizes[$index]] = $column < 5 ? ceil($column) : floor($column);
            }
        }

        return implode(' ', array_map(static function ($size, $column): string {
            $words = [
                '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
                'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen',
            ];

            return $words[$column].' wide '.$size;
        }, array_keys($columns), array_values($columns)));
    },
    'input'        => [
        'sizes'      => [
            'sm' => 'small',
            'lg' => 'large',
        ],
        'validation' => [
            'success' => 'success',
            'error'   => 'error',
        ],
    ],
    'select'       => [
        'sizes'      => [
            'sm' => 'small',
            'lg' => 'large',
        ],
        'validation' => [
            'success' => 'success',
            'error'   => 'error',
        ],
    ],
    'checkbox'     => [
        'validation' => [
            'success' => 'success',
            'error'   => 'error',
        ],
    ],
    'textarea'     => [
        'validation' => [
            'success' => 'success',
            'error'   => 'error',
        ],
    ],
    'alert'        => [
        'colors' => [
            'default' => 'blue',
            'success' => 'green',
            'warning' => 'yellow',
            'error'   => 'red',
            'info'    => 'info',
        ],
    ],
    'badge'        => [
        'colors' => [
            'default' => 'grey',
            'primary' => 'blue',
            'success' => 'green',
            'warning' => 'orange',
            'error'   => 'red',
            'info'    => 'teal',
        ],
    ],
    'button'       => [
        'colors' => [
            'default' => 'gery',
            'primary' => 'blue',
            'success' => 'positive',
            'warning' => 'orange',
            'error'   => 'negative',
            'info'    => 'teal',
        ],
        'states' => [
            'active'   => 'active',
            'disabled' => 'disabled',
        ],
        'sizes'  => [
            'sm' => 'small',
            'lg' => 'large',
        ],
    ],
    'button_group' => [
        'sizes' => [
            'sm' => 'small',
            'lg' => 'large',
        ],
    ],
    'dropdown'     => [
        'button' => [
            'icon' => '<i class="dropdown icon"></i>',
        ],
    ],
    'modal'        => [
        'sizes'  => [
            'default'    => 'tiny',
            'sm'         => 'mini',
            'lg'         => 'large',
            'fullscreen' => 'overlay fullscreen',
        ],
        'button' => [
            'attributes' => [
                'id' => 'toggle-modal-{id}',
            ],
        ],
    ],
    'progress'     => [
        'colors' => [
            'default' => 'blue',
            'success' => 'green',
            'warning' => 'orange',
            'error'   => 'red',
        ],
    ],
];
