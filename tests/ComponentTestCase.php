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
use RobiNN\UiKit\UiKit;

class ComponentTestCase extends TestCase {
    public UiKit $uikit;

    protected function setUp(): void {
        $this->uikit = UiKit::getInstance();
    }

    public function assertComponentRender(string $expected, string $actual): void {
        $indenter = new Indenter();
        $actual = str_replace('> ', '>', $indenter->indent($actual));

        $this->assertSame($expected, $actual);
    }

    public function assertComponentRenderTpl(string $path, string $tpl): void {
        $this->assertComponentRender($this->getFile($path), $this->uikit->renderTpl($tpl, [], true));
    }

    public function getFile(string $path): string {
        $html = file_get_contents(__DIR__.'/expected_html/'.$path.'.html');
        return trim($html);
    }
}
