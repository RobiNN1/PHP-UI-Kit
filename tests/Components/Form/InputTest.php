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

final class InputTest extends ComponentTestCase {
    public function testInputRender(): void {
        $tpl = $this->uikit->input->render('test', 'Test', 2);

        $this->assertComponentRender($this->getFile('form/input'), $tpl);
    }

    public function testInputInTwig(): void {
        $this->assertComponentRenderTpl('form/input', "{{ input('test', 'Test', 2) }}");
    }
}
