<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class AccordionTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testAccordionRender(): void {
        $tpl = $this->uikit->accordion('test', [
            'Title 1' => 'Content 1',
            'Title 2' => 'Content 2',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testAccordionInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ accordion('test', {
            'Title 1': 'Content 1',
            'Title 2': 'Content 2',
        }) }}");
    }
}
