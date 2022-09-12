<?php
/**
 * This file is part of Uikit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Frameworks\Bootstrap4\Layout;

use Tests\Components\Layout\GridTest;

final class GridBootstrap4Test extends GridTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_open_tpl = '<div class="col-xs-12">';
        $this->expected_close_tpl = '</div>';
        $this->expected_100_50_tpl = '<div class="col-xs-12 col-sm-6">';
        $this->fw_option_tpl = ['bootstrap4' => 'col-6'];
        $this->expected_fw_tpl = '<div class="col-6">';
        $this->expected_auto_tpl = '<div class="col">';
    }
}