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

final class ModalTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="modal fade" id="modal-test" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Modal Title
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><b>Testing</b></div>
            <div class="modal-footer">Random text....</div>
        </div>
    </div>
</div>';

    public function testModalRender(): void {
        $tpl = $this->uikit->modal->render('test', [
            'title'  => 'Modal Title',
            'body'   => '<b>Testing</b>',
            'footer' => 'Random text....',
        ]);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testModalInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ modal('test', {
            'title': 'Modal Title',
            'body': '<b>Testing</b>',
            'footer': 'Random text....',
        }) }}");
    }
}
