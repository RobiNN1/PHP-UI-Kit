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
    public function testBadgeRender(): void {
        $tpl = $this->uikit->badge->render('Default');

        $this->assertComponentRender($this->getFile('components/badge'), $tpl);
    }

    public function testBadgeInTwig(): void {
        $this->assertComponentRenderTpl('components/badge', "{{ badge('Default') }}");
    }
}
