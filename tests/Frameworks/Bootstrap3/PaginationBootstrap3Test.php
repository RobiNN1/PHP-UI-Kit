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

namespace Tests\Frameworks\Bootstrap3;

use Tests\Components\PaginationTestCase;

final class PaginationBootstrap3Test extends PaginationTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

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
