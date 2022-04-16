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

final class ButtonTest extends ComponentTestCase {
    public string $expectedTpl = '<button type="button" class="btn btn-secondary">Test</button>';

    public function testButtonRender(): void {
        $tpl = $this->uikit->button->render('Test');

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testButtonInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ button('Test') }}");
    }
}
