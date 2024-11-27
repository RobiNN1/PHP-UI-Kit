<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4;

use RobiNN\UiKit\Tests\Components\ButtonTestCase;

final class ButtonBootstrap4Test extends ButtonTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<button type="button" class="btn btn-secondary">Test</button>';
    }
}
