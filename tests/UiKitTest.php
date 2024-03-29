<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests;

use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\UiKit;

final class UiKitTest extends TestCase {
    private UiKit $uikit;

    protected function setUp(): void {
        $this->uikit = new UiKit();
    }

    public function testGetFramework(): void {
        $this->assertSame('bootstrap5', $this->uikit->config->getFramework());
    }

    public function testFrameworkOptionsSetterGetter(): void {
        $this->uikit->setFrameworkOption('jquery', true);

        $this->assertTrue($this->uikit->getFrameworkOption('jquery'));
    }

    public function testAddSuggestions(): void {
        $this->assertSame('Did you mean "alert"?', $this->uikit->addSuggestions('alerrt'));
    }
}
