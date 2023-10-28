<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\ListGroupTestCase;

final class ListGroupBootstrap3Test extends ListGroupTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="list-group">
    <div class="list-group-item">Item 1</div>
    <div class="list-group-item">Item 2</div>
    <a class="list-group-item" href="link.php">Link</a>
</div>';
    }
}
