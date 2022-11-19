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

class Badge extends Component {
    protected string $component = 'components/badge';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Badge ID.
        'class'      => '', // Badge class.
        'attributes' => [], // Array of custom attributes.
        'rounded'    => false, // Rounded badge.
    ];

    /**
     * Render badge.
     *
     * @param string               $text    Badge text.
     * @param string               $color   Badge color. Possible value: default|primary|success|warning|error|info
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $text, string $color = 'default', array $options = []): Component {
        $this->options($options);

        return $this->setTplData([
            'text'  => $text,
            'color' => $this->getOption('colors', $color),
        ]);
    }
}
