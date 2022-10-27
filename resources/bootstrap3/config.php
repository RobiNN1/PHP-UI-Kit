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
    'files'        => [
        'css' => [
            'https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css',
        ],
        'js'  => [
            'https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js',
        ],
    ],
    'grid_func'    => static function (array $col_sizes): string {
        $sizes = ['xs', 'sm', 'md', 'lg'];
        $columns = [];

        if (($key = array_search('auto', $col_sizes, true)) !== false) {
            unset($col_sizes[$key]);
            $col_sizes = array_values($col_sizes);
        }

        foreach ($col_sizes as $index => $value) {
            if (is_array($value) && isset($value['bootstrap3'])) {
                return $value['bootstrap3'];
            }

            if (!is_array($value) && isset($sizes[$index])) {
                $value = RobiNN\UiKit\Misc::convertFractions($value);
                $column = ($value * 12) / 100;
                $columns[$sizes[$index]] = $column < 5 ? ceil($column) : floor($column);
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
            'success' => 'has-success',
            'error'   => 'has-error',
        ],
    ],
    'select'       => [
        'sizes'      => [
            'sm' => 'sm',
            'lg' => 'lg',
        ],
        'validation' => [
            'success' => 'has-success',
            'error'   => 'has-error',
        ],
    ],
    'checkbox'     => [
        'validation' => [
            'success' => 'has-success',
            'error'   => 'has-error',
        ],
    ],
    'textarea'     => [
        'validation' => [
            'success' => 'has-success',
            'error'   => 'has-error',
        ],
    ],
    'alert'        => [
        'colors' => [
            'default' => 'alert-info',
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error'   => 'alert-danger',
            'info'    => 'alert-info',
        ],
    ],
    'badge'        => [
        'colors' => [
            'default' => 'label-default',
            'primary' => 'label-primary',
            'success' => 'label-success',
            'warning' => 'label-warning',
            'error'   => 'label-danger',
            'info'    => 'label-info',
        ],
    ],
    'button'       => [
        'colors' => [
            'default' => 'btn-default',
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
            'attributes' => ['data-toggle' => 'dropdown'],
            'icon'       => '<span class="caret"></span>',
        ],
    ],
    'modal'        => [
        'sizes'  => [
            'sm'         => 'modal-sm',
            'lg'         => 'modal-lg',
            'fullscreen' => 'modal-lg',
        ],
        'button' => [
            'attributes' => [
                'data-toggle' => 'modal',
                'data-target' => '#modal-{id}',
            ],
        ],
    ],
    'progress'     => [
        'colors' => [
            'success' => 'progress-bar-success',
            'warning' => 'progress-bar-warning',
            'error'   => 'progress-bar-danger',
        ],
    ],
];
