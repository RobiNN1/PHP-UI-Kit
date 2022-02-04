<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace RobiNN\UiKit\TplEngine;

use Latte\Engine;
use RobiNN\UiKit\Config;
use RobiNN\UiKit\ITplEngine;
use RobiNN\UiKit\UiKit;

class Latte implements ITplEngine {
    /**
     * @var Config
     */
    private Config $config;

    /**
     * @var Engine
     */
    private Engine $latte;

    /**
     * Init TPL engine.
     *
     * @param UiKit  $uikit
     * @param Config $config
     * @param bool   $debug
     *
     * @return Engine
     */
    public function init(UiKit $uikit, Config $config, bool $debug = false): Engine {
        $this->config = $config;
        $this->latte = new Engine;
        $this->latte->setTempDirectory($config->getCache().'/latte');
        $this->latte->setAutoRefresh($debug);

        foreach ($uikit->tplFunctions() as $function => $callback) {
            $this->latte->addFunction($function, $callback);
        }

        foreach ($uikit->tplFilters() as $filter => $callback) {
            $this->latte->addFilter($filter, $callback);
        }

        return $this->latte;
    }

    /**
     * Get TPL Instancee.
     *
     * @return object
     */
    public function getTplInstancee(): object {
        return $this->latte;
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
        return $this->latte->renderToString($this->config->getFrameworkPath(false).'templates/latte/'.$tpl.'.latte', $context);
    }
}
