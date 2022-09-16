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

use Tests\Components\MenuTest;

final class MenuFomanticui2Test extends MenuTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="sitemenu ui stackable menu">
    <div class="header item"> <i class="sidebar icon toc"></i> </div>
    <a class="item" href="link1.php">Item 1</a>
    <div class="ui dropdown item">
        <span>Dropdown <i class="dropdown icon"></i></span>
        <div class="menu"><a class="item active" href="sub_link2.php">Sub Item 2</a></div>
    </div>
</div>';
    }
}
