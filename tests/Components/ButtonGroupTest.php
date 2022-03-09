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

        $expected = '<div class="btn-group" role="group">
    <button type="button" class="btn btn-secondary" value="1">Yes</button>
    <button type="button" class="btn btn-secondary" value="0">No</button>
    <button type="button" class="btn btn-danger" value="delete">Delete</button>
    <button type="button" class="btn btn-secondary">No value 1</button>
    <button type="button" class="btn btn-secondary">No value 2</button>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
