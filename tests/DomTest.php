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
use RobiNN\UiKit\Dom;

class DomTest extends TestCase {
    public function testSetAttr(): void {
        $html = '<a href="link.php">Test</a>';
        $dom = new Dom($html);
        $dom->setAttr('a', 'class', 'test-link');

        $expected = '<a href="link.php" class="test-link">Test</a>';

        $this->assertSame($expected, trim($dom->save()));
    }

    public function testRemoveAttr(): void {
        $html = '<a href="link.php" class="test-link">Test</a>';
        $dom = new Dom($html);
        $dom->removeAttr('a', 'class');

        $expected = '<a href="link.php">Test</a>';

        $this->assertSame($expected, trim($dom->save()));
    }
}
