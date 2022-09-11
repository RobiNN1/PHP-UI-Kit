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

namespace Tests\Frameworks\Bootstrap4;

use Tests\Components\DropdownTest;

final class DropdownBootstrap4Test extends DropdownTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Item 1</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><span class="dropdown-item-text">Item 2</span></li>
        <li><b>Custom bold text</b></li>
    </ul>
</div>';
    }
}
