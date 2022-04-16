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

namespace Tests;

use Gajus\Dindent\Exception\RuntimeException;
use Gajus\Dindent\Indenter;
use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\UiKit;

class ComponentTestCase extends TestCase {
    public string $expectedTpl = '';

    public UiKit $uikit;

    protected function setUp(): void {
        $this->uikit = UiKit::getInstance()->init();
    }

    public function assertComponentRender(string $expected, string $actual): void {
        $indenter = new Indenter();
        try {
            $actual = str_replace('> ', '>', $indenter->indent($actual));
        } catch (RuntimeException) {
        }

        $this->assertSame($expected, $actual);
    }

    public function assertComponentRenderTpl(string $expected, string $tpl): void {
        $this->assertComponentRender($expected, $this->uikit->renderTpl($tpl, [], true));
    }
}
