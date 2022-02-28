<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components\Form;

use Tests\ComponentTestCase;

final class FormTest extends ComponentTestCase {
    public function testOpenForm(): void {
        $tpl = $this->uikit->form->render('get', '', ['open' => true]);

        $expected = '<form method="get">';

        $this->assertComponentRenders($expected, $tpl);
    }

    public function testCloseForm(): void {
        $tpl = $this->uikit->form->render('', '', ['close' => true]);

        $expected = '</form>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
