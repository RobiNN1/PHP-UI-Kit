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

use Gajus\Dindent\Indenter;
use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\Config;
use RobiNN\UiKit\UiKit;

class ComponentTestCase extends TestCase {
    public UiKit $uikit;

    public function __construct() {
        parent::__construct();

        $this->uikit = UiKit::getInstance(new Config());
    }

    public function assertComponentRenders(string $expected, string $actual): void {
        $indenter = new Indenter();
        $actual = $indenter->indent($actual);

        $this->assertSame($expected, $actual);
    }
}
