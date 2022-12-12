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

class Progress extends Component {
    protected string $component = 'components/progress';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'          => '', // Wrapper ID.
        'class'       => '', // Class for wrapper.
        'attributes'  => [], // Array of custom attributes.
        'item_class'  => '', // Class for item.
        'color'       => 'default', // Progress bar background color. Or array with colors. Possible value: default/success/warning/error
        'auto_colors' => null, // Function that sets the color depending on the width of the bar.
        'percents'    => true, // Show percent in title.
    ];

    /**
     * Render progress.
     *
     * @param int|array<int, int|string> $percent Percents, an array or asociative array for multiple bars.
     * @param array<string, mixed>       $options Additional options.
     */
    public function render(int|array $percent, array $options = []): Component {
        $this->options($options);

        $bars = [];

        $auto_colors = is_callable($this->options['auto_colors']) ? $this->options['auto_colors'] : null;

        if (!is_array($percent)) {
            $color = is_array($this->options['color']) ? $this->options['color'][0] : $this->options['color'];
            if ($auto_colors) {
                $color = $auto_colors($percent);
            }

            $bars[] = [
                'color'   => $this->getOption('colors', $color),
                'title'   => $this->options['percents'] ? $percent.'%' : '',
                'percent' => $percent,
            ];
        } else {
            $bars = $this->multiple($percent, $this->options, $auto_colors);
        }

        return $this->setTplData([
            'bars' => $bars,
        ]);
    }

    /**
     * Multiple bars.
     *
     * @param array<int, int|string> $percent
     * @param array<string, mixed>   $options
     *
     * @return array<int, mixed>
     */
    private function multiple(array $percent, array $options, ?callable $auto_colors): array {
        $bars = [];
        $i = 0;
        foreach ($percent as $bar => $title) {
            $color = is_array($options['color']) ? ($options['color'][$i] ?? 'default') : $options['color'];

            $is_assoc = static fn ($arr) => ($arr !== []) && array_keys($arr) !== range(0, (is_countable($arr) ? count($arr) : 0) - 1);
            $int = $is_assoc($percent) ? $bar : $title;

            if ($auto_colors) {
                $color = $auto_colors((int) $int);
            }

            $percents = $is_assoc($percent) ? ' '.$bar.'%' : '%';

            $bars[] = [
                'color'   => $this->getOption('colors', $color),
                'title'   => $title.($options['percents'] ? $percents : ''),
                'percent' => $int,
            ];

            $i++;
        }

        return $bars;
    }
}
