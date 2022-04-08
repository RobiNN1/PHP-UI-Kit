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
    public function testProgressRender(): void {
        $tpl = $this->uikit->progress->render(27);

        $this->assertComponentRender($this->getFile('components/progress'), $tpl);
    }

    public function testProgressInTwig(): void {
        $this->assertComponentRenderTpl('components/progress', "{{ progress(27) }}");
    }
}
