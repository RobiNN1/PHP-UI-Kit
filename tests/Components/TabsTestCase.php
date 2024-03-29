<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class TabsTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testTabsRender(): void {
        $tpl = $this->uikit->tabs('test', [
            ['title' => 'Tab 1', 'content' => 'Content 1'],
            ['title' => 'Tab 2', 'content' => 'Content 2'],
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testTabsInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ tabs('test', [
            {'title': 'Tab 1', 'content': 'Content 1'},
            {'title': 'Tab 2', 'content': 'Content 2'},
        ]) }}");
    }
}
