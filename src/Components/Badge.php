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

final class Badge extends Component {
    /**
     * @var string
     */
    protected string $component = 'components/badge';

    /**
     * Render badge.
     *
     * @param string $text    Badge text.
     * @param string $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $text, string $color = 'default', array $options = []): string {
        $this->options = array_merge([
            'id'         => '', // Badge ID.
            'class'      => '', // Badge class.
            'attributes' => [], // Array of custom attributes.
            'rounded'    => false, // Rounded badge.
        ], $options);

        return $this->tpl([
            'text'       => $text,
            'color'      => $this->getOption('colors', $color),
            'attributes' => $this->getAttributes($this->options['attributes'], $this->options['id']),
        ]);
    }
}
