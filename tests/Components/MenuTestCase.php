<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class MenuTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testMenuRender(): void {
        $tpl = $this->uikit->menu('test', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            [
                'title' => 'Dropdown',
                ['title' => 'Sub Item 2', 'link' => 'sub_link2.php', 'active' => true],
            ],
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testMenuInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ menu('test', [
            {'title': 'Item 1', 'link': 'link1.php'},
            {
                'title': 'Dropdown',
                0: {'title': 'Sub Item 2', 'link': 'sub_link2.php', 'active': true}
            }
        ]) }}");
    }
}
