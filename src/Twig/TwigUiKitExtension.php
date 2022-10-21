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

namespace RobiNN\UiKit\Twig;

use RobiNN\UiKit\AddTo;
use RobiNN\UiKit\Misc;
use RobiNN\UiKit\UiKit;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigUiKitExtension extends AbstractExtension {
    private UiKit $uikit;

    public function __construct(UiKit $uikit) {
        $this->uikit = $uikit;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array {
        $functions = [];

        $is_safe = ['is_safe' => ['html']];

        foreach ($this->uikit->allComponents() as $name => $class) {
            if (is_callable([$this->uikit, $name])) {
                $functions[] = new TwigFunction($name, function (...$arguments) use ($name) {
                    return $this->uikit->$name(...$arguments);
                }, $is_safe);
            }
        }

        $functions[] = new TwigFunction('add_to_head', [AddTo::class, 'head'], $is_safe);
        $functions[] = new TwigFunction('add_to_footer', [AddTo::class, 'footer'], $is_safe);
        $functions[] = new TwigFunction('add_to_js', [AddTo::class, 'js'], $is_safe);
        $functions[] = new TwigFunction('add_to_css', [AddTo::class, 'css'], $is_safe);

        $tpl_func = (array) $this->uikit->getFrameworkOption('tpl_funcs');

        if (count($tpl_func) > 0) {
            foreach ($tpl_func as $function_name => $callback) {
                if (is_callable($callback)) {
                    $functions[] = new TwigFunction($function_name, $callback, $is_safe);
                }
            }
        }

        return $functions;
    }

    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array {
        return [
            new TwigFilter('space', [Misc::class, 'space']),
        ];
    }
}
