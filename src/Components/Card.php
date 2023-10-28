<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Components;

class Card extends Component {
    protected string $component = 'components/card';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Wrapper ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'top_img'    => [], // Card top image.
        'header'     => '', // Card header.
        'top'        => '', // Card top content.
        'body'       => '', // Card body.
        'bottom'     => '', // Card bottom content.
        'footer'     => '', // Card footer.
        'link'       => '', // As link.
    ];

    /**
     * Render card.
     *
     * @param array<string, mixed> $options Additional options.
     */
    public function render(array $options = []): Component {
        $this->options($options);

        return $this;
    }
}
