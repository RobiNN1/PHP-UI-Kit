<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4;

use RobiNN\UiKit\Tests\Components\PaginationTestCase;

final class PaginationBootstrap4Test extends PaginationTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="page.php?p=2">&laquo;</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=1">1</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=2">2</a></li>
    <li class="page-item active"><a class="page-link" href="page.php?p=3">3</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=4">4</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=5">5</a></li>
    <li class="page-item"><a class="page-link" href="page.php?p=4">&raquo;</a></li>
</ul>';
    }
}
