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
