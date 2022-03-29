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

final class ButtonGroupTest extends ComponentTestCase {
    public function testButtonGroupRender(): void {
        $tpl = $this->uikit->button_group->render([
            1           => 'Yes',
            0           => 'No',
            'delete'    => ['title' => 'Delete', 'btn_options' => ['color' => 'error']],
            'no-value1' => ['title' => 'No value 1', 'value' => null],
            'no-value2' => ['title' => 'No value 2', 'btn_options' => ['value' => null]],
        ]);

        $this->assertComponentRender($this->getFile('components/button_group'), $tpl);
    }

    public function testButtonGroupInTwig(): void {
        $this->assertComponentRenderTpl('components/button_group', "{{ button_group({
            1: 'Yes',
            0: 'No',
            'delete': {'title': 'Delete', 'btn_options': {'color': 'error'}},
            'no-value1': {'title': 'No value 1', 'value': null},
            'no-value2': {'title': 'No value 2', 'btn_options': {'value': null}},
        }) }}");
    }
}
