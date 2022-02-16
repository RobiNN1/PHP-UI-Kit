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
use RobiNN\UiKit\Config;
use RobiNN\UiKit\UiKit;

class UiKitTest extends TestCase {
    private UiKit $uikit;

    protected function setUp(): void {
        $config = new Config(['cache' => __DIR__.'/cache']);

        $this->uikit = UiKit::getInstance($config, true);
    }

    public function testGetFramework(): void {
        $this->assertSame('bootstrap5', $this->uikit->getFramework());
    }

    public function testFrameworkOptionsSetterGetter(): void {
        $this->uikit->setFrameworkOption('jquery', true);

        $this->assertEquals(true, $this->uikit->getFrameworkOptions('jquery'));
    }
}