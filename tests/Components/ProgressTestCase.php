<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class ProgressTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testProgressRender(): void {
        $tpl = $this->uikit->progress(27);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testProgressInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, '{{ progress(27) }}');
    }
}
