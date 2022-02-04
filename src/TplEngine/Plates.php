<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UiKit\TplEngine;

use League\Plates\Engine;
use UiKit\Config;
use UiKit\ITplEngine;
use UiKit\UiKit;

class Plates implements ITplEngine {
    /**
     * @var Engine
     */
    private Engine $plates;

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
        $this->plates = new Engine($config->getFrameworkPath(false).'templates/plates', 'tpl');

        foreach ($uikit->tplFunctions() as $function => $callback) {
            $this->plates->registerFunction($function, $callback);
        }

        foreach ($uikit->tplFilters() as $filter => $callback) {
            $this->plates->registerFunction($filter, $callback);
        }

        return $this->plates;
    }

    /**
     * Get TPL Instancee.
     *
     * @return Engine
     */
    public function getTplInstancee(): Engine {
        return $this->plates;
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
        return $this->plates->render($tpl, $context);
    }
}
