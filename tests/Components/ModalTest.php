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

class ModalTest extends ComponentTestCase {
    public function testModalRender(): void {
        $tpl = $this->uikit->modal->render('test', [
            'title'  => 'Modal Title',
            'header' => 'Testttt',
            'body'   => '<b>Testing</b>',
            'footer' => 'Random text....',
        ]);

        $expected = '<div class="modal fade" id="modal-test" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Modal Title
                </h5>
                Testttt 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><b>Testing</b></div>
            <div class="modal-footer">Random text....</div>
        </div>
    </div>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
