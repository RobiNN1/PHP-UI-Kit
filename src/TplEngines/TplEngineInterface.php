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

namespace RobiNN\UiKit\TplEngines;

use RobiNN\UiKit\Config;
use RobiNN\UiKit\UiKit;

interface TplEngineInterface {
    /**
     * Init TPL engine.
     *
     * @param UiKit              $uikit
     * @param Config             $config
     * @param array<int, string> $paths
     *
     * @return object
     */
    public function init(UiKit $uikit, Config $config, array $paths = []): object;

    /**
     * Render template.
     *
     * @param string               $tpl
     * @param array<string, mixed> $data
     * @param bool                 $string
     *
     * @return string
     */
    public function render(string $tpl, array $data = [], bool $string = false): string;
}
