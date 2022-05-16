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

namespace Tests\Frameworks\Fomanticui2;

use Tests\Components\DropdownTest;

final class DropdownFomanticui2Test extends DropdownTest {
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
