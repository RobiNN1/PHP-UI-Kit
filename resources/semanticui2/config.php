<?php
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
    'grid_func'    => function ($col_sizes): string {
        if ($col_sizes === 'auto') {
            return '';
        }

        $sizes = ['tablet', 'computer', 'large screen'];
        $columns = [];

        foreach ($col_sizes as $index => $value) {
            if (is_array($value) && !empty($value['semanticui2'])) {
                return $value['semanticui2'];
            }

            if (!is_array($value)) {
                $column = ($value * 16) / 100;
                $column = $column < 5 ? ceil($column) : floor($column);

                if (!empty($sizes[$index])) {
                    $columns[$sizes[$index]] = $column;
                }
            }
        }

        if (!empty($columns)) {
            return implode(' ', array_map(function ($size, $column) {
                $words = [
                    '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
                    'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen',
                ];
                return $words[$column].' wide '.$size;
            }, array_keys($columns), array_values($columns)));
        }

        return '';
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
            'title' => '<i class="dropdown icon"></i>',
        ],
    ],
    'menu'         => [
        'colors' => [
            'light' => '',
            'dark'  => 'inverted',
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
