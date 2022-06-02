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

abstract class DropdownTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testDropdownRender(): void {
        $tpl = $this->uikit->dropdown->render('Dropdown', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            'divider',
            ['title' => 'Item 2'],
            ['custom' => '<b>Custom bold text</b>'],
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
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
