<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components\Form;

use Tests\ComponentTestCase;

class InputTest extends ComponentTestCase {
    public function testInputRender(): void {
        $tpl = $this->uikit->input->render('test', 'Test', 2);

        $expected = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <input value="2" type="text" id="test" name="test" class="form-control">
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
