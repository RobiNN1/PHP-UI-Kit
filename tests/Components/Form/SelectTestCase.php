<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components\Form;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class SelectTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testSelectRender(): void {
        $tpl = $this->uikit->select('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testSelectInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ select('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]) }}");
    }
}
