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

use RobiNN\UiKit\Components\Component;
use Tests\ComponentTestCase;

final class ComponentTest extends ComponentTestCase {
    private Component $component;

    public function __construct() {
        parent::__construct();

        $this->component = new Component($this->uikit);
    }

    public function testGetAttributes(): void {
        $attributes = $this->component->getAttributes([
            'no_value'     => null,
            'zero'         => 0,
            'one'          => 1,
            'string'       => 'test',
            'empty-string' => '',
        ]);

        $expected = 'no_value zero="0" one="1" string="test" empty-string=""';

        $this->assertSame($expected, $attributes);
    }

    public function testCheckComponent(): void {
        $this->assertTrue($this->component->checkComponent('button'));
    }

    public function testGetOption(): void {
        $array = [
            'colors' => [
                'default' => 'alert-primary',
                'success' => 'alert-success',
            ],
        ];

        $this->assertSame('alert-success', $this->component->getOption('colors', 'success', $array));
    }

    public function testNoComponentMsg(): void {
        $actual = $this->component->noComponentMsg('button_group');

        $expected = 'Component <b>button_group</b> is not supported in <b>bootstrap5</b> framework.';

        $this->assertSame($expected, $actual);
    }

    public function testNoComponentMsgWithRequired(): void {
        $actual = $this->component->noComponentMsg('button_group', 'special_button');

        $expected = 'Component <b>button_group</b> requires support for <b>special_button</b> component in <b>bootstrap5</b> framework.';

        $this->assertSame($expected, $actual);
    }
}
