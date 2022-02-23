<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit;

interface ITplEngine {
    /**
     * Init TPL engine.
     *
     * @param UiKit  $uikit
     * @param Config $config
     * @param bool   $debug
     *
     * @return object
     */
    public function init(UiKit $uikit, Config $config, bool $debug = false): object;

    /**
     * Get TPL Instance.
     *
     * @return object
     */
    public function getTplInstance(): object;

    /**
     * Render template.
     *
     * @param string $tpl
     * @param array  $context
     *
     * @return string
     */
    public function render(string $tpl, array $context = []): string;

    /**
     * Add paths with templates.
     *
     * @param array $paths
     *
     * @return void
     */
    public function addPaths(array $paths): void;
}
