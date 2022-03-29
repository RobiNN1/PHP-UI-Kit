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

use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\Components\Component;

final class ComponentTest extends TestCase {
    private Component $component;

    protected function setUp(): void {
        $this->component = new Component();
    }

    public function testGetAttributes(): void {
        $attributes = $this->component->getAttributes([
            'no_value'     => null,
            'zero'         => 0,
            'one'          => 1,
            'string'       => 'test',
            'empty-string' => '',
        ]);

        $this->assertSame('no_value zero="0" one="1" string="test" empty-string=""', $attributes);
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
}
