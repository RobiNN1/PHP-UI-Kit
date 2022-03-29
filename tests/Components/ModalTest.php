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

final class ModalTest extends ComponentTestCase {
    public function testModalRender(): void {
        $tpl = $this->uikit->modal->render('test', [
            'title'  => 'Modal Title',
            'body'   => '<b>Testing</b>',
            'footer' => 'Random text....',
        ]);

        $this->assertComponentRenders($this->getFile('components/modal'), $tpl);
    }
}
