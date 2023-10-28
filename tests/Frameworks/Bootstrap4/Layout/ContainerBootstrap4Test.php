<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4\Layout;

use RobiNN\UiKit\Tests\Components\Layout\ContainerTestCase;

final class ContainerBootstrap4Test extends ContainerTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_open_tpl = '<div class="container">';
        $this->expected_close_tpl = '</div>';
    }
}
