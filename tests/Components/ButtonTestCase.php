<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class ButtonTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testButtonRender(): void {
        $tpl = $this->uikit->button('Test');

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testButtonInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ button('Test') }}");
    }
}
