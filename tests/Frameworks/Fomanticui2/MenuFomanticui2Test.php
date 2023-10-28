<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\MenuTestCase;

final class MenuFomanticui2Test extends MenuTestCase {
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
