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
    public string $expectedTpl = '<div class="alert alert-primary" role="alert">Default</div>';

    public function testAlertRender(): void {
        $tpl = $this->uikit->alert->render('Default');

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testAlertInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ alert('Default') }}");
    }
}
