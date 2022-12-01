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

use RobiNN\UiKit\Misc;

class ButtonGroup extends Component {
    protected string $component = 'components/button_group';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Wrapper ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'size'       => 'default', // Button group size. Possible value: default/sm/lg
        'type'       => 'button', // Default type for all buttons. Possible value: button/submit/reset
        'item_class' => '', // Class for item.
    ];

    /**
     * Render a button group.
     *
     * @param array<int|string, array<string, mixed>|string> $items   Associative array or multidimensional array.
     * @param array<string, mixed>                           $options Additional options.
     */
    public function render(array $items, array $options = []): Component {
        $this->options($options);

        return $this->setTplData([
            'buttons' => $this->buttons($items, $this->options),
            'size'    => $this->getOption('sizes', $this->options['size']),
        ]);
    }

    /**
     * Render buttons.
     *
     * @param array<int|string, mixed> $items
     * @param array<string, mixed>     $options
     *
     * @return array<int, string>
     */
    private function buttons(array $items, array $options): array {
        $buttons = [];

        foreach ($items as $value => $button) {
            $title = is_array($button) ? $button['title'] : $button;
            $type = $button['type'] ?? $options['type'];
            $btn_options = $button['btn_options'] ?? [];

            $btn_opt_value = array_key_exists('value', $btn_options) ? $btn_options['value'] : $value;
            $value = array_key_exists('value', (array) $button) ? $button['value'] : $btn_opt_value;

            $btn_options['class'] = $options['item_class'].Misc::space($btn_options['class'] ?? '');

            $btn = [
                'value' => $value,
                'link'  => $button['link'] ?? '',
            ];

            $buttons[] = $this->uikit->button($title, $type, array_merge($btn, $btn_options))->__toString();
        }

        return $buttons;
    }
}
