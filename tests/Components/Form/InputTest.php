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

abstract class InputTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testInputRender(): void {
        $tpl = $this->uikit->input->render('test', 'Test', 2);
        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
    }

    public function testInputInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ input('test', 'Test', 2) }}");
    }
}
