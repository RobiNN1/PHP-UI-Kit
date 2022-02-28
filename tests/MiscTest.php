<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\Misc;

final class MiscTest extends TestCase {
    public function testArrayGet(): void {
        $array = [
            'alert' => [
                'colors' => [
                    'default' => 'alert-primary',
                    'success' => 'alert-success',
                ],
            ],
        ];

        $array_get = Misc::arrayGet($array, 'alert.colors.default');

        $this->assertSame('alert-primary', $array_get);
    }

    public function testArraySet(): void {
        $array = [
            'alert' => [
                'colors' => [
                    'default' => 'alert-primary',
                    'success' => 'alert-success',
                ],
            ],
        ];

        Misc::arraySet($array, 'alert.colors.default', 'blue');

        $expected = [
            'alert' => [
                'colors' => [
                    'default' => 'blue',
                    'success' => 'alert-success',
                ],
            ],
        ];

        $this->assertEqualsCanonicalizing($expected, $array);
    }
}
