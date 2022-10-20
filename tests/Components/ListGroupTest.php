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

abstract class ListGroupTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testListGroupRender(): void {
        $tpl = $this->uikit->list_group([
            'Item 1',
            'Item 2',
            ['title' => 'Link', 'link' => 'link.php'],
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testListGroupInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ list_group([
            'Item 1',
            'Item 2',
            {'title': 'Link', 'link': 'link.php'}
        ]) }}");
    }
}
