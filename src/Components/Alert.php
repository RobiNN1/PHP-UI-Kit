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

class Alert extends Component {
    protected string $component = 'components/alert';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Alert ID.
        'class'      => '', // Alert class.
        'attributes' => [], // Array of custom attributes.
        'dismiss'    => false, // Make alert dismissable.
    ];

    /**
     * Render alert.
     *
     * @param string               $text    Alert text.
     * @param string               $color   Alert color. Possible value: default|success|warning|error|info
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
