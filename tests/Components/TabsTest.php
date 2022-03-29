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

final class TabsTest extends ComponentTestCase {
    public function testTabsRender(): void {
        $tpl = $this->uikit->tabs->render('test', [
            ['title' => 'Tab 1', 'content' => 'Content 1'],
            ['title' => 'Tab 2', 'content' => 'Content 2'],
        ]);

        $this->assertComponentRenders($this->getFile('components/tabs'), $tpl);
    }
}
