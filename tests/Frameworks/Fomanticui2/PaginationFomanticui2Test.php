<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\PaginationTestCase;

final class PaginationFomanticui2Test extends PaginationTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui mini pagination menu"> <a class="item disabled" href="page.php?p=2">&laquo;</a> <a class="item" href="page.php?p=1">1</a> <a class="item" href="page.php?p=2">2</a> <a class="item active" href="page.php?p=3">3</a> <a class="item" href="page.php?p=4">4</a> <a class="item" href="page.php?p=5">5</a> <a class="item" href="page.php?p=4">&raquo;</a> </div>';
    }
}
