<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class BadgeTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testBadgeRender(): void {
        $tpl = $this->uikit->badge('Default');

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testBadgeInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ badge('Default') }}");
    }
}
