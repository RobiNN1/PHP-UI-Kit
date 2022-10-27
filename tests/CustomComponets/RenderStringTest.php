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

namespace Tests\CustomComponets;

use Tests\ComponentTestCase;

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
        $this->assertComponentRenderTpl('Name: test', '{{ render_string(\'test\') }}');
        $this->assertComponentRenderTpl('<nav>', '{{ render_string_open() }}');
        $this->assertComponentRenderTpl('</nav>', '{{ render_string_close() }}');
    }
}
