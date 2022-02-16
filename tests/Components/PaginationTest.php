<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components;

use Tests\ComponentTestCase;

class PaginationTest extends ComponentTestCase {
    public function testPaginationRender(): void {
        $tpl = $this->uikit->pagination->render(range(1, 5), [
            'link'     => 'page.php?p=%s',
            'current'  => 3,
            'disabled' => 'prev',
        ]);

        $expected = '<ul class="pagination">
    <li class="page-item disabled"> <a class="page-link" href="page.php?p=2">&laquo;</a> </li>
    <li class="page-item"> <a class="page-link" href="page.php?p=1">1</a> </li>
    <li class="page-item"> <a class="page-link" href="page.php?p=2">2</a> </li>
    <li class="page-item active"> <a class="page-link" href="page.php?p=3">3</a> </li>
    <li class="page-item"> <a class="page-link" href="page.php?p=4">4</a> </li>
    <li class="page-item"> <a class="page-link" href="page.php?p=5">5</a> </li>
    <li class="page-item"> <a class="page-link" href="page.php?p=4">&raquo;</a> </li>
</ul>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
