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

abstract class CheckboxTestCase extends ComponentTestCase {
    protected string $expected_tpl;
    protected string $expected_multiple_tpl;

    public function testCheckboxRender(): void {
        $tpl = $this->uikit->checkbox('test', 'Test');

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testCheckboxInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ checkbox('test', 'Test') }}");
    }

    public function testMultipleCheckboxesRender(): void {
        $tpl = $this->uikit->checkbox('test-multiple', 'Test checkboxes', 0, [
            'items' => [
                0 => 'Checkbox 1',
                1 => 'Checkbox 2',
                2 => 'Checkbox 3',
            ],
        ]);

        $this->assertComponentRender($this->expected_multiple_tpl, $tpl->__toString());
    }
}
