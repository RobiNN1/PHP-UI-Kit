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

namespace Tests\Frameworks\Bootstrap3\Layout;

use Tests\Components\Layout\ContainerTest;

final class ContainerBootstrap3Test extends ContainerTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_open_tpl = '<div class="container">';
        $this->expected_close_tpl = '</div>';
    }
}
