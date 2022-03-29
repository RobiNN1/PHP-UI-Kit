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

final class AccordionTest extends ComponentTestCase {
    public function testAccordionRender(): void {
        $tpl = $this->uikit->accordion->render('test', [
            'Title 1' => 'Content 1',
            'Title 2' => 'Content 2',
        ]);

        $this->assertComponentRenders($this->getFile('components/accordion'), $tpl);
    }
}
