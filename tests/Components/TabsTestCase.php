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
