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

class AccordionTest extends ComponentTestCase {
    public function testAccordionRender(): void {
        $tpl = $this->uikit->accordion->render('test', [
            'Title 1' => 'Content 1',
            'Title 2' => 'Content 2',
        ]);

        $expected = '<div class="accordion" id="accordion-test">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-test1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-test1" aria-expanded="true" aria-controls="collapse-test1">Title 1</button>
        </h2>
        <div id="collapse-test1" class="accordion-collapse collapse" aria-labelledby="heading-test1" data-bs-parent="#accordion-test">
            <div class="accordion-body">Content 1</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-test2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-test2" aria-expanded="true" aria-controls="collapse-test2">Title 2</button>
        </h2>
        <div id="collapse-test2" class="accordion-collapse collapse" aria-labelledby="heading-test2" data-bs-parent="#accordion-test">
            <div class="accordion-body">Content 2</div>
        </div>
    </div>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
