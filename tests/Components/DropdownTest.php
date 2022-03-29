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

final class DropdownTest extends ComponentTestCase {
    public function testDropdownRender(): void {
        $tpl = $this->uikit->dropdown->render('Dropdown', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            'divider',
            ['title' => 'Item 2'],
            ['custom' => '<b>Custom bold text</b>'],
        ]);

        $this->assertComponentRenders($this->getFile('components/dropdown'), $tpl);
    }
}
