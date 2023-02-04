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

namespace Tests\Frameworks\Fomanticui2\Layout;

use Tests\Components\Layout\GridTestCase;

final class GridFomanticui2Test extends GridTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_open_tpl = '<div class="column">';
        $this->expected_close_tpl = '</div>';
        $this->expected_100_50_tpl = '<div class="eight wide tablet column">';
        $this->fw_option_tpl = ['fomanticui2' => 'five wide tablet'];
        $this->expected_fw_tpl = '<div class="five wide tablet column">';
        $this->expected_auto_tpl = '<div class="column">';
        $this->expected_auto_multiple_tpl = '<div class="eight wide tablet column">';
    }
}
