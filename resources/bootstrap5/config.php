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
    'jquery'       => false,
    'files'        => [
        'css' => ['https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'],
        'js'  => ['https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'],
    ],
    'grid_func'    => static function (array $col_sizes): string {
        $sizes = ['xs', 'sm', 'md', 'lg'];
        $columns = [];

        foreach ($col_sizes as $index => $value) {
            if ($value === 'auto') {
                return 'col';
            }

            if (is_array($value) && !empty($value['bootstrap5'])) {
                return $value['bootstrap5'] === 'auto' ? 'col' : $value['bootstrap5'];
            }

            if (!is_array($value)) {
                $column = ($value * 12) / 100;
                $column = $column < 5 ? ceil($column) : floor($column);

                if (!empty($sizes[$index])) {
                    $columns[$sizes[$index]] = $column;
                }
            }
        }

        return implode(' ', array_map(static function ($size, $column): string {
            return 'col-'.$size.'-'.$column;
        }, array_keys($columns), array_values($columns)));
    },
    'input'        => [
        'sizes'      => [
            'sm' => 'sm',
            'lg' => 'lg',
        ],
        'validation' => [
            'success' => 'is-valid',
            'error'   => 'is-invalid',
        ],
    ],
    'select'       => [
        'sizes'      => [
            'sm' => 'sm',
            'lg' => 'lg',
        ],
        'validation' => [
            'success' => 'is-valid',
            'error'   => 'is-invalid',
        ],
    ],
    'alert'        => [
        'colors' => [
            'default' => 'alert-primary',
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error'   => 'alert-danger',
            'info'    => 'alert-info',
        ],
    ],
    'badge'        => [
        'colors' => [
            'default' => 'bg-secondary',
            'primary' => 'bg-primary',
            'success' => 'bg-success',
            'warning' => 'bg-warning',
            'error'   => 'bg-danger',
            'info'    => 'bg-info',
        ],
    ],
    'button'       => [
        'colors' => [
            'default' => 'btn-secondary',
            'primary' => 'btn-primary',
            'success' => 'btn-success',
            'warning' => 'btn-warning',
            'error'   => 'btn-danger',
            'info'    => 'btn-info',
        ],
        'states' => [
            'active'   => 'active',
            'disabled' => 'disabled',
        ],
        'sizes'  => [
            'sm' => 'btn-sm',
            'lg' => 'btn-lg',
        ],
    ],
    'button_group' => [
        'sizes' => [
            'sm' => 'btn-group-sm',
            'lg' => 'btn-group-lg',
        ],
    ],
    'dropdown'     => [
        'button' => [
            'class'      => 'dropdown-toggle',
            'attributes' => ['data-bs-toggle' => 'dropdown'],
        ],
    ],
    'menu'         => [
        'colors' => [
            'light' => 'navbar-light bg-light',
            'dark'  => 'navbar-dark bg-dark',
        ],
    ],
    'modal'        => [
        'sizes'  => [
            'default'    => '',
            'sm'         => 'modal-sm',
            'lg'         => 'modal-lg',
            'fullscreen' => 'modal-fullscreen',
        ],
        'button' => [
            'attributes' => [
                'data-bs-toggle' => 'modal',
                'data-bs-target' => '#modal-{id}',
            ],
        ],
    ],
    'progress'     => [
        'colors' => [
            'default' => '',
            'success' => 'bg-success',
            'warning' => 'bg-warning',
            'error'   => 'bg-danger',
        ],
    ],
];
