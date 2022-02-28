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
    public function testOpenContainer(): void {
        $tpl = $this->uikit->container->render(false, ['open' => true]);

        $expected = '<div class="container">';

        $this->assertComponentRenders($expected, $tpl);
    }

    public function testCloseContainer(): void {
        $tpl = $this->uikit->container->render(false, ['close' => true]);

        $expected = '</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
