<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\DropdownTestCase;

final class DropdownBootstrap3Test extends DropdownTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="dropdown">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Item 1</a></li>
        <li>
            <hr class="divider">
        </li>
        <li><span class="dropdown-item-text">Item 2</span></li>
        <li><b>Custom bold text</b></li>
    </ul>
</div>';
    }
}
