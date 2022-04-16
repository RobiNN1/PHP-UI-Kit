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

namespace Tests\Components;

use Tests\ComponentTestCase;

final class ProgressTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="progress mb-2">
    <div class="progress-bar" style="width: 27%;">27%</div>
</div>';

    public function testProgressRender(): void {
        $tpl = $this->uikit->progress->render(27);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testProgressInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, '{{ progress(27) }}');
    }
}
