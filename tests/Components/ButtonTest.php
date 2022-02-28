<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components;

use Tests\ComponentTestCase;

final class ButtonTest extends ComponentTestCase {
    public function testButtonRender(): void {
        $tpl = $this->uikit->button->render('Test');

        $expected = '<button type="button" class="btn btn-secondary">Test</button>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
