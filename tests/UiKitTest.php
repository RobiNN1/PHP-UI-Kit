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

final class UiKitTest extends TestCase {
    private UiKit $uikit;

    protected function setUp(): void {
        $this->uikit = new UiKit(new Config());
    }

    public function testGetFramework(): void {
        $this->assertSame('bootstrap5', $this->uikit->getFramework());
    }

    public function testFrameworkOptionsSetterGetter(): void {
        $this->uikit->setFrameworkOption('jquery', true);

        $this->assertEquals(true, $this->uikit->getFrameworkOptions('jquery'));
    }
}
