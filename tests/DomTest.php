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

final class DomTest extends TestCase {
    private Dom $dom;

    protected function setUp(): void {
        $html = '<a href="link.php" class="linkclass">Example</a>';

        $this->dom = new Dom($html);
    }

    public function testGetAttr(): void {
        $this->assertSame('linkclass', $this->dom->getAttr('a', 'class'));
    }

    public function testSetAttr(): void {
        $this->dom->setAttr('a', 'id', 'example');

        $this->assertSame('<a href="link.php" class="linkclass" id="example">Example</a>', trim($this->dom->save()));
    }

    public function testRemoveAttr(): void {
        $this->dom->removeAttr('a', 'class');

        $this->assertSame('<a href="link.php">Example</a>', trim($this->dom->save()));
    }
}
