<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components;

use Tests\ComponentTestCase;

final class ListGroupTest extends ComponentTestCase {
    public function testListGroupRender(): void {
        $tpl = $this->uikit->list_group->render([
            'Item 1',
            'Item 2',
        ]);

        $this->assertComponentRenders($this->getFile('components/list_group'), $tpl);
    }
}
