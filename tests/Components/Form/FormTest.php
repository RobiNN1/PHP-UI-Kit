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

namespace Tests\Components\Form;

use Tests\ComponentTestCase;

final class FormTest extends ComponentTestCase {
    public function testOpenFormRender(): void {
        $tpl = $this->uikit->form->open('get');
        $this->assertComponentRender('<form method="get">', $tpl);
    }

    public function testCloseFormRender(): void {
        $tpl = $this->uikit->form->close();
        $this->assertComponentRender('</form>', $tpl);
    }

    public function testFormInTwig(): void {
        $this->assertComponentRenderTpl('<form method="get">', "{{ form_open('get') }}");

        $this->assertComponentRenderTpl('</form>', '{{ form_close() }}');
    }
}
