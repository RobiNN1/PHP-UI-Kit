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

final class DropdownTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="link1.php">Item 1</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><span class="dropdown-item-text">Item 2</span></li>
        <li><b>Custom bold text</b></li>
    </ul>
</div>';

    public function testDropdownRender(): void {
        $tpl = $this->uikit->dropdown->render('Dropdown', [
            ['title' => 'Item 1', 'link' => 'link1.php'],
            'divider',
            ['title'  => 'Item 2'],
            ['custom' => '<b>Custom bold text</b>'],
        ]);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testDropdownInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ dropdown('Dropdown', [
            {'title': 'Item 1', 'link': 'link1.php'},
            'divider',
            {'title': 'Item 2'},
            {'custom': '<b>Custom bold text</b>'},
        ]) }}");
    }
}
