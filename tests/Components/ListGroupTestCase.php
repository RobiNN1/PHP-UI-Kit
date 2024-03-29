<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class ListGroupTestCase extends ComponentTestCase {
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
