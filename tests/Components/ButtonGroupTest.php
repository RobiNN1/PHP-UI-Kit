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

namespace Tests\Components;

use Tests\ComponentTestCase;

abstract class ButtonGroupTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testButtonGroupRender(): void {
        $tpl = $this->uikit->button_group->render([
            1           => 'Yes',
            0           => 'No',
            'delete'    => ['title' => 'Delete', 'btn_options' => ['color' => 'error']],
            'no-value1' => ['title' => 'No value 1', 'value' => null],
            'no-value2' => ['title' => 'No value 2', 'btn_options' => ['value' => null]],
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
    }

    public function testButtonGroupInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ button_group({
            1: 'Yes',
            0: 'No',
            'delete': {'title': 'Delete', 'btn_options': {'color': 'error'}},
            'no-value1': {'title': 'No value 1', 'value': null},
            'no-value2': {'title': 'No value 2', 'btn_options': {'value': null}},
        }) }}");
    }
}
