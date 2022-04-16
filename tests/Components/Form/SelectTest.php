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

final class SelectTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <select id="test" name="test" class="form-select" aria-label="Test">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2" selected>item3</option>
    </select>
</div>';

    public function testSelectRender(): void {
        $tpl = $this->uikit->select->render('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testSelectInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ select('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]) }}");
    }
}
