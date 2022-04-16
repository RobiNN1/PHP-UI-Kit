<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

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
        $this->assertComponentRenderTpl('<div class="row">', '{{ row_open() }}');

        $this->assertComponentRenderTpl('</div>', '{{ row_close() }}');
    }
}
