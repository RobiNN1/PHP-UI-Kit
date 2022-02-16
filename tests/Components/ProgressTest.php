<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components;

use Tests\ComponentTestCase;

class ProgressTest extends ComponentTestCase {
    public function testProgressRender(): void {
        $tpl = $this->uikit->progress->render(27);

        $expected = '<div class="progress mb-2">
    <div class="progress-bar" style="width: 27%;">27%</div>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
