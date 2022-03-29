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

final class RowTest extends ComponentTestCase {
    public function testOpenRowRender(): void {
        $tpl = $this->uikit->row->open();

        $this->assertComponentRender('<div class="row">', $tpl);
    }

    public function testCloseRowRender(): void {
        $tpl = $this->uikit->row->close();

        $this->assertComponentRender('</div>', $tpl);
    }

    public function testRowInTwig(): void {
        $this->assertComponentRender('<div class="row">', $this->uikit->renderTpl("{{ row_open() }}", [], true));
        $this->assertComponentRender('</div>', $this->uikit->renderTpl("{{ row_close() }}", [], true));
    }
}
