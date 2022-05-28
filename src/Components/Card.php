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

final class Card extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/card';

    /**
     * Render card.
     *
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $options = []): string {
        $this->options = array_merge([
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
        ], $options);

        return $this->tpl([
            'attributes' => $this->getAttributes($this->options['attributes'], $this->options['id']),
        ]);
    }
}
