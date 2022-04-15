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
        $this->assertComponentRender('<div class="col-xs-12">', $this->uikit->grid->open([100]));
        $this->assertComponentRender('<div class="col-xs-12 col-sm-6">', $this->uikit->grid->open([100, 50]));
        $this->assertComponentRender('<div class="col-6">', $this->uikit->grid->open([100, 50, ['bootstrap5' => 'col-6',],]));
        $this->assertComponentRender('<div class="col">', $this->uikit->grid->open(['auto']));
    }

    public function testGridInTwig(): void {
        $this->assertComponentRender('<div class="col-xs-12">', $this->uikit->renderTpl("{{ grid_open([100]) }}", [], true));
        $this->assertComponentRender('</div>', $this->uikit->renderTpl("{{ grid_close() }}", [], true));
    }
}
