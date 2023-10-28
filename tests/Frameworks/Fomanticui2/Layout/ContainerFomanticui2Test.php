<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2\Layout;

use RobiNN\UiKit\Tests\Components\Layout\ContainerTestCase;

final class ContainerFomanticui2Test extends ContainerTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_open_tpl = '<div class="ui container">';
        $this->expected_close_tpl = '</div>';
    }
}
