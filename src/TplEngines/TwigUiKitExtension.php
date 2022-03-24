<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\TplEngines;

use RobiNN\UiKit\UiKit;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigUiKitExtension extends AbstractExtension {
    public function __construct(private UiKit $uikit) {
    }

    public function getFunctions() {
        $functions = [];

        foreach ($this->uikit->tplFunctions() as $function => $callback) {
            $functions[] = new TwigFunction($function, $callback, ['is_safe' => ['html']]);
        }

        return $functions;
    }

    public function getFilters() {
        $filters = [];

        foreach ($this->uikit->tplFilters() as $filter => $callback) {
            $filters[] = new TwigFilter($filter, $callback);
        }

        return $filters;
    }
}
