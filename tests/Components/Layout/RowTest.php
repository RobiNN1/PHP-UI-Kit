<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components\Layout;

use Tests\ComponentTestCase;

class RowTest extends ComponentTestCase {
    public function testOpenRow(): void {
        $tpl = $this->uikit->row->render(['open' => true]);
        $expected = '<div class="row">';

        $this->assertComponentRenders($expected, $tpl);
    }

    public function testCloseRow(): void {
        $tpl = $this->uikit->row->render(['close' => true]);
        $expected = '</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
