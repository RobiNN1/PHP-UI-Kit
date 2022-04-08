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

final class AlertTest extends ComponentTestCase {
    public function testAlertRender(): void {
        $tpl = $this->uikit->alert->render('Default');

        $this->assertComponentRender($this->getFile('components/alert'), $tpl);
    }

    public function testAlertInTwig(): void {
        $this->assertComponentRenderTpl('components/alert', "{{ alert('Default') }}");
    }
}
