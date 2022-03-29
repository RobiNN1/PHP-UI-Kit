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

final class GridTest extends ComponentTestCase {
    public function testOpenGridRender(): void {
        $tpl = $this->uikit->grid->open([100]);

        $this->assertComponentRender('<div class="col-xs-12">', $tpl);
    }

    public function testCloseGridRender(): void {
        $tpl = $this->uikit->grid->close();

        $this->assertComponentRender('</div>', $tpl);
    }

    public function testGridInTwig(): void {
        $this->assertComponentRender('<div class="col-xs-12">', $this->uikit->renderTpl("{{ grid_open([100]) }}", [], true));
        $this->assertComponentRender('</div>', $this->uikit->renderTpl("{{ grid_close() }}", [], true));
    }
}
