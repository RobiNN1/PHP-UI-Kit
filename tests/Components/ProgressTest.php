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

abstract class ProgressTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testProgressRender(): void {
        $tpl = $this->uikit->progress->render(27);

        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
    }

    public function testProgressInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, '{{ progress(27) }}');
    }
}
