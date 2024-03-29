<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class ModalTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testModalRender(): void {
        $tpl = $this->uikit->modal('test', [
            'title'  => 'Modal Title',
            'body'   => '<b>Testing</b>',
            'footer' => 'Random text...',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testModalInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ modal('test', {
            'title': 'Modal Title',
            'body': '<b>Testing</b>',
            'footer': 'Random text...',
        }) }}");
    }
}
