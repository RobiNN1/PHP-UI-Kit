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
    /**
     * @var string
     */
    protected string $component = 'components/progress';

    /**
     * Render progress.
     *
     * @param array|int $percent Percents, an array or asociative array for multiple bars.
     * @param array     $options Additional options.
     *
     * @return string
     */
    public function render(array|int $percent, array $options = []): string {
        $options = array_merge([
            'id'          => '', // Wrapper ID.
            'class'       => '', // Class for wrapper.
            'attributes'  => [], // Array of custom attributes.
            'item_class'  => '', // Class for item.
            'color'       => 'default', // Progress bar background color. Or array with colors. Possible value: default/success/warning/error
            'auto_colors' => null, // Function that sets the color depending on the width of the bar.
            'percents'    => true, // Show percent in title.
        ], $options);

        $bars = [];

        $auto_colors = is_callable($options['auto_colors']) ? $options['auto_colors'] : null;

        if (!is_array($percent)) {
            $color = is_array($options['color']) ? $options['color'][0] : $options['color'];
            if ($auto_colors) {
                $color = $auto_colors($percent);
            }

            $bars[] = [
                'color'   => $this->getOption('colors', $color),
                'title'   => $options['percents'] ? (int) $percent.'%' : '',
                'percent' => (int) $percent,
            ];
        } else {
            $bars = $this->multiple($percent, $options, $auto_colors);
        }

        return $this->tpl([
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'item_class' => $options['item_class'],
            'bars'       => $bars,
        ]);
    }

    /**
     * Multiple bars.
     *
     * @param array         $percent
     * @param array         $options
     * @param callable|null $auto_colors
     *
     * @return array
     */
    private function multiple(array $percent, array $options, ?callable $auto_colors): array {
        $bars = [];
        $i = 0;
        foreach ($percent as $bar => $title) {
            $color = is_array($options['color']) ? ($options['color'][$i] ?? 'default') : $options['color'];

            $is_assoc = static fn ($arr) => ([] !== $arr) && array_keys($arr) !== range(0, (is_countable($arr) ? count($arr) : 0) - 1);
            $int = (int) $is_assoc($percent) ? $bar : $title;

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
