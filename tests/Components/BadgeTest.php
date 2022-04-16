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

final class BadgeTest extends ComponentTestCase {
    public string $expectedTpl = '<span class="badge bg-secondary">Default</span>';

    public function testBadgeRender(): void {
        $tpl = $this->uikit->badge->render('Default');

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testBadgeInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ badge('Default') }}");
    }
}
