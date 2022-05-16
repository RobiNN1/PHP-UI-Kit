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

abstract class AccordionTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testAccordionRender(): void {
        $tpl = $this->uikit->accordion->render('test', [
            'Title 1' => 'Content 1',
            'Title 2' => 'Content 2',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl);
    }

    public function testAccordionInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ accordion('test', {
            'Title 1': 'Content 1',
            'Title 2': 'Content 2',
        }) }}");
    }
}
