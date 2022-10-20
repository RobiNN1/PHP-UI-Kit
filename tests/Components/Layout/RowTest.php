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

abstract class RowTest extends ComponentTestCase {
    protected string $expected_open_tpl;
    protected string $expected_close_tpl;

    public function testOpenRowRender(): void {
        $tpl = $this->uikit->row_open();

        $this->assertComponentRender($this->expected_open_tpl, $tpl->__toString());
    }

    public function testCloseRowRender(): void {
        $tpl = $this->uikit->row_close();

        $this->assertComponentRender($this->expected_close_tpl, $tpl);
    }

    public function testRowInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_open_tpl, '{{ row_open() }}');

        $this->assertComponentRenderTpl($this->expected_close_tpl, '{{ row_close() }}');
    }
}
