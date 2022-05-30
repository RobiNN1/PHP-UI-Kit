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

use RobiNN\UiKit\AddTo;
use RobiNN\UiKit\Misc;
use RobiNN\UiKit\UiKit;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigUiKitExtension extends AbstractExtension {
    public function __construct(private readonly UiKit $uikit) {
    }

    public function getFunctions(): array {
        $functions = [];

        $is_safe = ['is_safe' => ['html']];

        foreach ($this->uikit->allComponents() as $name => $component) {
            if ((bool) $component['open_close'] === true) {
                $functions[] = new TwigFunction($name.'_open', [$this->uikit->getComponent($name), 'open'], $is_safe);
                $functions[] = new TwigFunction($name.'_close', [$this->uikit->getComponent($name), 'close'], $is_safe);
            }

            $functions[] = new TwigFunction($name, [$this->uikit->getComponent($name), 'render'], $is_safe);
        }

        $functions[] = new TwigFunction('add_to_head', [AddTo::class, 'head'], $is_safe);
        $functions[] = new TwigFunction('add_to_footer', [AddTo::class, 'footer'], $is_safe);
        $functions[] = new TwigFunction('add_to_js', [AddTo::class, 'js'], $is_safe);
        $functions[] = new TwigFunction('add_to_jquery', [AddTo::class, 'jQuery'], $is_safe);
        $functions[] = new TwigFunction('add_to_css', [AddTo::class, 'css'], $is_safe);

        return $functions;
    }

    public function getFilters(): array {
        return [
            new TwigFilter('space', [Misc::class, 'space']),
        ];
    }
}
