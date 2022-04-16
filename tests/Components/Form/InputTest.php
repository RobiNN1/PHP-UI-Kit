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

namespace Tests\Components\Form;

use Tests\ComponentTestCase;

final class InputTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <input value="2" type="text" id="test" name="test" class="form-control" aria-label="Test">
</div>';

    public function testInputRender(): void {
        $tpl = $this->uikit->input->render('test', 'Test', 2);
        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testInputInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ input('test', 'Test', 2) }}");
    }
}
