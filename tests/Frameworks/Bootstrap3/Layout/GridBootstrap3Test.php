<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3\Layout;

use RobiNN\UiKit\Tests\Components\Layout\GridTestCase;

final class GridBootstrap3Test extends GridTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_open_tpl = '<div class="col-xs-12">';
        $this->expected_close_tpl = '</div>';
        $this->expected_100_50_tpl = '<div class="col-xs-12 col-sm-6">';
        $this->fw_option_tpl = ['bootstrap3' => 'col-xs-9'];
        $this->expected_fw_tpl = '<div class="col-xs-9">';
        $this->expected_auto_tpl = '<div class="">';
        $this->expected_auto_multiple_tpl = '<div class="col-xs-12 col-sm-6">';
    }
}
