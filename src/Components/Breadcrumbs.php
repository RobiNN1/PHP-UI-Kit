<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Components;

class Breadcrumbs extends Component {
    protected string $component = 'components/breadcrumbs';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Wrapper ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
        'divider'    => '/', // Items divider.
    ];

    /**
     * Render breadcrumbs.
     *
     * @param array<string, string> $links   Associative array.
     * @param array<string, mixed>  $options Additional options.
     */
    public function render(array $links, array $options = []): Component {
        $this->options($options);

        return $this->setTplData([
            'links' => $links,
        ]);
    }
}
