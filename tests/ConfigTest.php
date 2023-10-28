<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests;

use PHPUnit\Framework\TestCase;
use RobiNN\UiKit\Config;

final class ConfigTest extends TestCase {
    private Config $config;

    protected function setUp(): void {
        $this->config = new Config();
    }

    public function testCacheSetterGetter(): void {
        $value = '../test_cache/';

        $this->config->setCache($value);

        $this->assertSame($value, $this->config->getCache());
    }

    public function testDebugSetterGetter(): void {
        $this->config->enableDebug();

        $this->assertTrue($this->config->getDebug());
    }

    public function testFrameworkSetterGetter(): void {
        $value = 'tailwind';

        $this->config->setFramework($value);

        $this->assertSame($value, $this->config->getFramework());
    }

    public function testFrameworkPathSetterGetter(): void {
        $framework = 'tailwind';
        $value = '../tailwind';

        $this->config->setFrameworkPath($framework, $value);

        $this->assertSame($value, $this->config->getFrameworkPath($framework));
    }
}
