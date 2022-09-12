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

abstract class GridTest extends ComponentTestCase {
    protected string $expected_open_tpl;
    protected string $expected_close_tpl;
    protected string $expected_100_50_tpl;
    protected string $expected_fw_tpl;
    protected string $expected_auto_tpl;

    /**
     * @var array<string, string>
     */
    protected array $fw_option_tpl;

    public function testOpenGridRender(): void {
        $tpl = $this->uikit->grid->open([100]);

        $this->assertComponentRender($this->expected_open_tpl, $tpl->toHtml());
    }

    public function testCloseGridRender(): void {
        $tpl = $this->uikit->grid->close();

        $this->assertComponentRender($this->expected_close_tpl, $tpl);
    }

    public function testGridVariants(): void {
        $tpl_100_50 = $this->uikit->grid->open([100, 50]);
        $this->assertComponentRender($this->expected_100_50_tpl, $tpl_100_50->toHtml());

        $tpl_fw = $this->uikit->grid->open([100, 50, $this->fw_option_tpl]);
        $this->assertComponentRender($this->expected_fw_tpl, $tpl_fw->toHtml());

        $tpl_auto = $this->uikit->grid->open(['auto']);
        $this->assertComponentRender($this->expected_auto_tpl, $tpl_auto->toHtml());
    }

    public function testGridInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_open_tpl, '{{ grid_open([100]) }}');

        $this->assertComponentRenderTpl($this->expected_close_tpl, '{{ grid_close() }}');
    }
}
