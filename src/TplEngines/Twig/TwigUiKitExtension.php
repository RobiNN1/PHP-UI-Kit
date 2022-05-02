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

namespace RobiNN\UiKit\TplEngines\Twig;

use RobiNN\UiKit\UiKit;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigUiKitExtension extends AbstractExtension {
    public function __construct(private readonly UiKit $uikit) {
    }

    public function getFunctions(): array {
        $functions = [];

        foreach ($this->uikit->tplFunctions() as $function => $callback) {
            $functions[] = new TwigFunction($function, $callback, ['is_safe' => ['html']]);
        }

        return $functions;
    }

    public function getFilters(): array {
        $filters = [];

        foreach ($this->uikit->tplFilters() as $filter => $callback) {
            $filters[] = new TwigFilter($filter, $callback);
        }

        return $filters;
    }
}
