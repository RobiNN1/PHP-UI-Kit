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

use RobiNN\UiKit\Config;
use RobiNN\UiKit\UiKit;

interface ITplEngine {
    /**
     * Init TPL engine.
     *
     * @param UiKit  $uikit
     * @param Config $config
     *
     * @return object
     */
    public function init(UiKit $uikit, Config $config): object;

    /**
     * Render template.
     *
     * @param string $tpl
     * @param array  $data
     *
     * @return string
     */
    public function render(string $tpl, array $data = []): string;

    /**
     * Add paths with templates.
     *
     * @param array $paths
     *
     * @return void
     */
    public function addPaths(array $paths): void;
}
