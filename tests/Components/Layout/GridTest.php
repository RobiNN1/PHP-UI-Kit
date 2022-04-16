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

final class GridTest extends ComponentTestCase {
    public function testOpenGridRender(): void {
        $tpl = $this->uikit->grid->open([100]);

        $this->assertComponentRender('<div class="col-xs-12">', $tpl);
    }

    public function testCloseGridRender(): void {
        $tpl = $this->uikit->grid->close();

        $this->assertComponentRender('</div>', $tpl);
    }

    public function testGridVariants(): void {
        $tpl_100 = $this->uikit->grid->open([100]);
        $this->assertComponentRender('<div class="col-xs-12">', $tpl_100);

        $tpl_100_50 = $this->uikit->grid->open([100, 50]);
        $this->assertComponentRender('<div class="col-xs-12 col-sm-6">', $tpl_100_50);

        $tpl_bs = $this->uikit->grid->open([100, 50, ['bootstrap5' => 'col-6',],]);
        $this->assertComponentRender('<div class="col-6">', $tpl_bs);

        $tpl_auto = $this->uikit->grid->open(['auto']);
        $this->assertComponentRender('<div class="col">', $tpl_auto);
    }

    public function testGridInTwig(): void {
        $this->assertComponentRenderTpl('<div class="col-xs-12">', '{{ grid_open([100]) }}');

        $this->assertComponentRenderTpl('</div>', '{{ grid_close() }}');
    }
}
