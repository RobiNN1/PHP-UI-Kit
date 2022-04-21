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

final class CheckboxTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="mb-1">
    <div class="form-check">
        <input value="0" type="checkbox" id="test" name="test" class="form-check-input">
        <label for="test" class="form-check-label">Test</label>
    </div>
</div>';

    public function testCheckboxRender(): void {
        $tpl = $this->uikit->checkbox->render('test', 'Test');

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testCheckboxInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ checkbox('test', 'Test') }}");
    }

    public function testMultipleCheckboxesRender(): void {
        $tpl = $this->uikit->checkbox->render('test-multiple', 'Test checkboxes', 0, [
            'items' => [
                0 => 'Checkbox 1',
                1 => 'Checkbox 2',
                2 => 'Checkbox 3',
            ],
        ]);

        $expected = '<div class="mb-1">
    <span>Test checkboxes</span>
    <div class="form-check">
        <input value="0" type="checkbox" id="test-multiple0" name="test-multiple" class="form-check-input" checked>
        <label for="test-multiple0" class="form-check-label">Checkbox 1</label>
    </div>
    <div class="form-check">
        <input value="1" type="checkbox" id="test-multiple1" name="test-multiple" class="form-check-input">
        <label for="test-multiple1" class="form-check-label">Checkbox 2</label>
    </div>
    <div class="form-check">
        <input value="2" type="checkbox" id="test-multiple2" name="test-multiple" class="form-check-input">
        <label for="test-multiple2" class="form-check-label">Checkbox 3</label>
    </div>
</div>';

        $this->assertComponentRender($expected, $tpl);
    }
}
