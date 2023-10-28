<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class AlertTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testAlertRender(): void {
        $tpl = $this->uikit->alert('Default');

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testAlertInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ alert('Default') }}");
    }
}
