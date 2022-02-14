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

class MenuTest extends ComponentTestCase {
    public function testMenuRender(): void {
        $tpl = $this->uikit->menu->render('test', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            'dropdown' => [
                'title' => 'Dropdown',
                ['title' => 'Sub Item 2', 'link' => 'sub_link2.php', 'active' => true],
            ],
        ]);

        $expected = '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartest" aria-controls="navbartest" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbartest">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"> <a class="nav-link" href="link1.php">Item 1</a> </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbar-dptest" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Dropdown </a> 
                    <ul class="dropdown-menu" aria-labelledby="navbar-dptest">
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
