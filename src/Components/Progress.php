<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components;

class Progress extends Component {
    /**
     * @param int|array $percent Percents, array [12, 20] or asociative array [12 => 'Title', 22 => 'Title'] for multiple bars.
     * @param array     $options Additional options. Default value: []
     *
     * @return string
     */
    public function render($percent, array $options = []): string {
        $component = 'progress';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            'id'          => '', // Wrapper ID.
            'class'       => '', // Class for wrapper.
            'attributes'  => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'color'       => 'default', // Progress bar backgroud color. Possible value: default|success|warning|error
            'auto_colors' => null, // Set auto colors function that depends on bar width.
            'percents'    => true, // Show percents in title.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $bars = [];

        $auto_colors = is_callable($options['auto_colors']) ? $options['auto_colors'] : null;

        if (!is_array($percent)) {
            $color = is_array($options['color']) ? $options['color'][0] : $options['color'];
            if ($auto_colors) {
                $color = $auto_colors((int)$percent);
            }

            $bars[] = [
                'color'   => $this->getOption('colors', $color, $fwoptions),
                'title'   => $options['percents'] ? (int)$percent.'%' : '',
                'percent' => (int)$percent,
            ];
        } else {
            $i = 0;
            foreach ($percent as $bar => $title) {
                $color = is_array($options['color']) ? ($options['color'][$i] ?? 'default') : $options['color'];

                $is_assoc = fn($arr) => !([] === $arr) && array_keys($arr) !== range(0, count($arr) - 1);
                $int = (int)$is_assoc($percent) ? $bar : $title;

                if ($auto_colors) {
                    $color = $auto_colors((int)$int);
                }

                $bars[] = [
                    'color'   => $this->getOption('colors', $color, $fwoptions),
                    'title'   => $title.($options['percents'] ? ($is_assoc($percent) ? ' '.$bar.'%' : '%') : ''),
                    'percent' => $int,
                ];

                $i++;
            }
        }

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'bars'       => $bars,
        ];

        return $this->uikit->renderTpl('components/'.$component, $context);
    }
}
