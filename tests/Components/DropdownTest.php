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

class DropdownTest extends ComponentTestCase {
    public function testDropdownRender(): void {
        $tpl = $this->uikit->dropdown->render('test', 'Dropdown', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            'divider',
            ['title' => 'Item 2'],
            ['custom' => '<b>Custom bold text</b>'],
        ]);

        $expected = '<div class="dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu">
        <li> <a class="dropdown-item" href="link1.php">Item 1</a> </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li> <span class="dropdown-item-text">Item 2</span> </li>
        <li><b>Custom bold text</b></li>
    </ul>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
