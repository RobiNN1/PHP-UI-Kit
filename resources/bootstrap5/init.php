<?php
$init = [
    'jquery'       => false,
    'files'        => [
        'css' => ['https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'],
        'js'  => ['https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'],
    ],
    'layout'       => [
        'grid_func' => 'bootstrap5_grid'/** @uses bootstrap5_grid() */
    ],
    'components'   => [
        // List of supported components
        'accordion', 'alert', 'badge', 'breadcrumbs', 'button', 'button_group', 'card',
        'carousel', 'dropdown', 'list_group', 'menu', 'modal', 'pagination', 'tabs',
    ],
    'alert'        => [
        'colors'  => [
            'default' => 'alert-primary',
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error'   => 'alert-danger',
            'info'    => 'alert-info',
        ],
        'classes' => [
            'a' => 'alert-link',
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
        'sizes'  => [
            'default' => '',
            'sm'      => 'btn-sm',
            'lg'      => 'btn-lg',
        ],
    ],
    'button_group' => [
        'sizes' => [
            'default' => '',
            'sm'      => 'btn-group-sm',
            'lg'      => 'btn-group-lg',
        ],
    ],
    'card'         => [
        'classes' => [
            'p'        => 'card-text',
            'title'    => 'card-title',
            'subtitle' => 'card-subtitle',
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
];

/**
 * @param array|string $col_sizes
 *
 * @return string
 */
function bootstrap5_grid($col_sizes): string {
    $sizes = ['xs', 'sm', 'md', 'lg'];

    if ($col_sizes === 'auto') {
        return 'col';
    }

    $columns = [];

    foreach ($col_sizes as $index => $value) {
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

    if (!empty($columns)) {
        return implode(' ', array_map(function ($size, $column) {
            return 'col-'.$size.'-'.$column;
        }, array_keys($columns), array_values($columns)));
    }

    return 'col';
}
