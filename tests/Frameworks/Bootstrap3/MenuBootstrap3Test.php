<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\MenuTestCase;

final class MenuBootstrap3Test extends MenuTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-test" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-test">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link" href="link1.php">Item 1</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="dropdown-item" href="sub_link2.php">Sub Item 2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>';
    }
}
