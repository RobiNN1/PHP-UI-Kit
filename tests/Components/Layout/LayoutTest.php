<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components\Layout;

use Tests\ComponentTestCase;

final class LayoutTest extends ComponentTestCase {
    public function testRender(): void {
        $tpl = $this->uikit->layout->render('test');

        $this->assertComponentRenders($this->getFile('layout/layout'), $tpl);
    }
}
