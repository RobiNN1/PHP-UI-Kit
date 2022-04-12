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

final class SelectTest extends ComponentTestCase {
    public function testSelectRender(): void {
        $tpl = $this->uikit->select->render('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]);

        $this->assertComponentRender($this->getFile('form/select'), $tpl);
    }

    public function testSelectInTwig(): void {
        $this->assertComponentRenderTpl('form/select', "{{ select('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]) }}");
    }
}
