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

final class MenuTest extends ComponentTestCase {
    public function testMenuRender(): void {
        $tpl = $this->uikit->menu->render('test', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            [
                'title' => 'Dropdown',
                ['title' => 'Sub Item 2', 'link' => 'sub_link2.php', 'active' => true],
            ],
        ]);

        $expected = '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartest"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbartest">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link" href="link1.php">Item 1</a> </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a> 
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item active" href="sub_link2.php">Sub Item 2</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
