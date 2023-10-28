<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\CustomComponets;

use RobiNN\UiKit\Tests\ComponentTestCase;

final class RenderStringTest extends ComponentTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->addComponent('render_string', RenderString::class);
    }

    public function testCustomComponentRender(): void {
        $this->assertSame('Name: test', $this->uikit->render_string('test'));

        $this->assertSame('<nav>', $this->uikit->render_string_open());
        $this->assertSame('</nav>', $this->uikit->render_string_close());
    }

    public function testCustomComponentInTwig(): void {
        $this->assertComponentRenderTpl('Name: test', "{{ render_string('test') }}");
        $this->assertComponentRenderTpl('<nav>', '{{ render_string_open() }}');
        $this->assertComponentRenderTpl('</nav>', '{{ render_string_close() }}');
    }
}
