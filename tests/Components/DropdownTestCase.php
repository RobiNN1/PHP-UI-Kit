<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class DropdownTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testDropdownRender(): void {
        $tpl = $this->uikit->dropdown('Dropdown', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            'divider',
            ['title' => 'Item 2'],
            ['custom' => '<b>Custom bold text</b>'],
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testDropdownInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ dropdown('Dropdown', [
            {'title': 'Item 1', 'link': 'link1.php'},
            'divider',
            {'title': 'Item 2'},
            {'custom': '<b>Custom bold text</b>'},
        ]) }}");
    }
}
