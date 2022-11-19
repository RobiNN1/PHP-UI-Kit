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

class Carousel extends Component {
    protected string $component = 'components/carousel';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'item_class' => '', // Class for item.
        'indicators' => true, // Carousel indicators.
        'controls'   => true, // Carousel controls buttons.
    ];

    /**
     * Render carousel.
     *
     * @param string               $id      Carousel ID.
     * @param array<int, string>   $slides  Array of items.
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $id, array $slides, array $options = []): Component {
        $this->options($options);

        return $this->setTplData([
            'id'     => $id,
            'slides' => $slides,
        ]);
    }
}
