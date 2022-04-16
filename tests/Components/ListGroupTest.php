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

final class ListGroupTest extends ComponentTestCase {
    public string $expectedTpl = '<ul class="list-group">
    <li class="list-group-item">Item 1</li>
    <li class="list-group-item">Item 2</li>
</ul>';

    public function testListGroupRender(): void {
        $tpl = $this->uikit->list_group->render([
            'Item 1',
            'Item 2',
        ]);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testListGroupInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ list_group([
            'Item 1',
            'Item 2',
        ]) }}");
    }
}
