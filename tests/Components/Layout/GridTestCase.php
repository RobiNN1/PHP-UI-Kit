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

abstract class GridTestCase extends ComponentTestCase {
    protected string $expected_open_tpl;
    protected string $expected_close_tpl;
    protected string $expected_100_50_tpl;
    protected string $expected_fw_tpl;
    protected string $expected_auto_tpl;
    protected string $expected_auto_multiple_tpl;

    /**
     * @var array<string, string>
     */
    protected array $fw_option_tpl;

    public function testOpenGridRender(): void {
        $tpl = $this->uikit->grid_open([100]);

        $this->assertComponentRender($this->expected_open_tpl, $tpl->__toString());
    }

    public function testCloseGridRender(): void {
        $tpl = $this->uikit->grid_close();

        $this->assertComponentRender($this->expected_close_tpl, $tpl);
    }

    public function testGridVariants(): void {
        $tpl_100_50 = $this->uikit->grid_open([100, 50]);
        $this->assertComponentRender($this->expected_100_50_tpl, $tpl_100_50->__toString());

        $tpl_fw = $this->uikit->grid_open([100, 50, $this->fw_option_tpl]);
        $this->assertComponentRender($this->expected_fw_tpl, $tpl_fw->__toString());

        $tpl_auto = $this->uikit->grid_open(['auto']);
        $this->assertComponentRender($this->expected_auto_tpl, $tpl_auto->__toString());

        $tpl_auto_multiple = $this->uikit->grid_open(['auto', 100, '1/2']);
        $this->assertComponentRender($this->expected_auto_multiple_tpl, $tpl_auto_multiple->__toString());
    }

    public function testGridFractions(): void {
        $tpl_100_50 = $this->uikit->grid_open(['1/1', '1/2']);
        $this->assertComponentRender($this->expected_100_50_tpl, $tpl_100_50->__toString());

        $tpl2_100_50 = $this->uikit->grid_open([100, '1/2']);
        $this->assertComponentRender($this->expected_100_50_tpl, $tpl2_100_50->__toString());
    }

    public function testGridInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_open_tpl, '{{ grid_open([100]) }}');

        $this->assertComponentRenderTpl($this->expected_close_tpl, '{{ grid_close() }}');
    }
}
