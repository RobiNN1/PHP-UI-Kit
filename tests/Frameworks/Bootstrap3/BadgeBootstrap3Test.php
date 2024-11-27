<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\BadgeTestCase;

final class BadgeBootstrap3Test extends BadgeTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<span class="label label-default">Default</span>';
    }
}
