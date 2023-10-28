<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\DropdownTestCase;

final class DropdownFomanticui2Test extends DropdownTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui dropdown">
    <button type="button" class="ui button gery">Dropdown <i class="dropdown icon"></i></button>
    <div class="menu">
        <a class="item" href="link1.php">Item 1</a>
        <div class="divider"></div>
        <span class="item">Item 2</span><b>Custom bold text</b>
    </div>
</div>';
    }
}
