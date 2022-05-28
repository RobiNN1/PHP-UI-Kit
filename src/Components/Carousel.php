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

final class Carousel extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/carousel';

    /**
     * Render carousel.
     *
     * @param string $id      Carousel ID.
     * @param array  $slides  Array of items.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $id, array $slides, array $options = []): string {
        $this->options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'indicators' => true, // Carousel indicators.
            'controls'   => true, // Carousel controls buttons.
        ], $options);

        return $this->tpl([
            'id'     => $id,
            'slides' => $slides,
        ]);
    }
}
