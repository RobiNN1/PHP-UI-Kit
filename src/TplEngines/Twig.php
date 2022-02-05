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

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;
use RobiNN\UiKit\Config;
use RobiNN\UiKit\ITplEngine;
use RobiNN\UiKit\UiKit;

class Twig implements ITplEngine {
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * Init TPL engine.
     *
     * @param UiKit  $uikit
     * @param Config $config
     * @param bool   $debug
     *
     * @return Environment
     */
    public function init(UiKit $uikit, Config $config, bool $debug = false): Environment {
        $loader = new FilesystemLoader($config->getFrameworkPath().'templates/twig');
        $this->twig = new Environment($loader, [
            'cache' => $config->getCache().'/twig',
            'debug' => $debug
        ]);

        if ($debug) {
            $this->twig->addExtension(new DebugExtension());
        }

        foreach ($uikit->tplFunctions() as $function => $callback) {
            $this->twig->addFunction(new TwigFunction($function, $callback, ['is_safe' => ['html']]));
        }

        foreach ($uikit->tplFilters() as $filter => $callback) {
            $this->twig->addFilter(new TwigFilter($filter, $callback));
        }

        return $this->twig;
    }

    /**
     * Get TPL Instancee.
     *
     * @return object
     */
    public function getTplInstancee(): object {
        return $this->twig;
    }

    /**
     * Render template.
     *
     * @param string $tpl
     * @param array  $context
     *
     * @return string
     */
    public function render(string $tpl, array $context = []): string {
        return $this->twig->render($tpl.'.twig', $context);
    }
}
