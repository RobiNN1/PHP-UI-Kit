<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components\Form;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class InputTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testInputRender(): void {
        $tpl = $this->uikit->input('test', 'Test', 2);
        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testInputInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ input('test', 'Test', 2) }}");
    }
}
