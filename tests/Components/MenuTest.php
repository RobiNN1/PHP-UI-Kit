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

        $this->assertComponentRender($this->getFile('components/menu'), $tpl);
    }

    public function testMenuInTwig(): void {
        $this->assertComponentRenderTpl('components/menu', "{{ menu('test', [
            {'title': 'Item 1', 'link': 'link1.php'},
            {
                'title': 'Dropdown',
                0: {'title': 'Sub Item 2', 'link': 'sub_link2.php', 'active': true}
            }
        ]) }}");
    }
}
