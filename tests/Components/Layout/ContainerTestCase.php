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

abstract class ContainerTestCase extends ComponentTestCase {
    protected string $expected_open_tpl;
    protected string $expected_close_tpl;

    public function testOpenContainerRender(): void {
        $tpl = $this->uikit->container_open();

        $this->assertComponentRender($this->expected_open_tpl, $tpl->__toString());
    }

    public function testCloseContainerRender(): void {
        $tpl = $this->uikit->container_close();

        $this->assertComponentRender($this->expected_close_tpl, $tpl);
    }

    public function testContainerInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_open_tpl, '{{ container_open() }}');

        $this->assertComponentRenderTpl($this->expected_close_tpl, '{{ container_close() }}');
    }
}