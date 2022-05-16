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

abstract class FormTest extends ComponentTestCase {
    protected string $expected_open_tpl;
    protected string $expected_close_tpl;

    public function testOpenFormRender(): void {
        $tpl = $this->uikit->form->open('get');
        $this->assertComponentRender($this->expected_open_tpl, $tpl);
    }

    public function testCloseFormRender(): void {
        $tpl = $this->uikit->form->close();
        $this->assertComponentRender($this->expected_close_tpl, $tpl);
    }

    public function testFormInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_open_tpl, "{{ form_open('get') }}");

        $this->assertComponentRenderTpl($this->expected_close_tpl, '{{ form_close() }}');
    }
}
