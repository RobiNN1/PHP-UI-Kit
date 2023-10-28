<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components\Form;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class TextareaTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testTextareaRender(): void {
        $tpl = $this->uikit->textarea('test', 'Test');

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testTextareaInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ textarea('test', 'Test') }}");
    }
}
