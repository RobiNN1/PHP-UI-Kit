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

class GridTest extends ComponentTestCase {
    public function testOpenGrid(): void {
        $tpl = $this->uikit->grid->render([100], ['open' => true]);

        $expected = '<div class="col-xs-12">';

        $this->assertComponentRenders($expected, $tpl);
    }

    public function testCloseGrid(): void {
        $tpl = $this->uikit->grid->render([], ['close' => true]);
        $expected = '</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
