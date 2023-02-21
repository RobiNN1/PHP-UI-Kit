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

abstract class SelectTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testSelectRender(): void {
        $tpl = $this->uikit->select('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testSelectInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ select('test', 'Test', 2, [
            'item1',
            'item2',
            'item3',
        ]) }}");
    }
}