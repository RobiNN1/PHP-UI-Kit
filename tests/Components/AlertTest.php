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

abstract class AlertTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testAlertRender(): void {
        $tpl = $this->uikit->alert('Default');

        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
    }

    public function testAlertInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ alert('Default') }}");
    }
}
