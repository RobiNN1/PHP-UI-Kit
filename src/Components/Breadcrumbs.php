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

class Breadcrumbs extends Component {
    /**
     * Render breadcrumbs.
     *
     * @param array $links   Associative array.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $links, array $options = []): string {
        $component = 'breadcrumbs';

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'item_class' => '', // Class for item.
            'divider'    => '/', // Items divider.
        ], $options);

        return $this->uikit->render('components/'.$component, [
            'links'      => $links,
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'item_class' => $options['item_class'],
            'divider'    => $options['divider'],
        ]);
    }
}
