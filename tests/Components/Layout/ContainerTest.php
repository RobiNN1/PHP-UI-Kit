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

final class ContainerTest extends ComponentTestCase {
    public function testOpenContainerRender(): void {
        $tpl = $this->uikit->container->open(false);

        $this->assertComponentRender('<div class="container">', $tpl);
    }

    public function testCloseContainerRender(): void {
        $tpl = $this->uikit->container->close();

        $this->assertComponentRender('</div>', $tpl);
    }

    public function testContainerInTwig(): void {
        $this->assertComponentRender('<div class="container">', $this->uikit->renderTpl("{{ container_open() }}", [], true));
        $this->assertComponentRender('</div>', $this->uikit->renderTpl("{{ container_close() }}", [], true));
    }
}
