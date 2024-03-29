<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests;

use Gajus\Dindent\Exception\RuntimeException;
use Gajus\Dindent\Indenter;
use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\UiKit;

abstract class ComponentTestCase extends TestCase {
    public UiKit $uikit;

    protected function setUp(): void {
        $this->uikit = new UiKit();
    }

    public function assertComponentRender(string $expected, string $actual): void {
        try {
            $indenter = new Indenter();
            $actual_indented = $indenter->indent($actual);

            // bugfix for unwanted whitespace at the end of string
            $html = array_map(static fn ($html): string => rtrim((string) $html), explode("\n", $actual_indented));
            $actual_indented = implode("\n", $html);
        } catch (RuntimeException) {
            $actual_indented = $actual;
        }

        $this->assertSame($expected, $actual_indented);
    }

    public function assertComponentRenderTpl(string $expected, string $tpl): void {
        $this->assertComponentRender($expected, $this->uikit->render($tpl, [], true));
    }
}
