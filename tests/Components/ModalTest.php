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

abstract class ModalTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testModalRender(): void {
        $tpl = $this->uikit->modal->render('test', [
            'title'  => 'Modal Title',
            'body'   => '<b>Testing</b>',
            'footer' => 'Random text...',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
    }

    public function testModalInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ modal('test', {
            'title': 'Modal Title',
            'body': '<b>Testing</b>',
            'footer': 'Random text...',
        }) }}");
    }
}
