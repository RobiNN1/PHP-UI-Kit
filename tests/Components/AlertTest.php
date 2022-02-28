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

final class AlertTest extends ComponentTestCase {
    public function testAlertRender(): void {
        $tpl = $this->uikit->alert->render('Default');

        $expected = '<div class="alert alert-primary" role="alert"> Default </div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
