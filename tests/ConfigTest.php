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

        $this->assertEquals($value, $this->config->getCache());
    }

    public function testDebugSetterGetter(): void {
        $this->config->enableDebug();

        $this->assertTrue($this->config->getDebug());
    }

    public function testFrameworkSetterGetter(): void {
        $value = 'tailwind';

        $this->config->setFramework($value);

        $this->assertEquals($value, $this->config->getFramework());
    }

    public function testFrameworkPathSetterGetter(): void {
        $framework = 'tailwind';
        $value = '../tailwind';

        $this->config->setFrameworkPath($framework, $value);

        $this->assertEquals($value, $this->config->getFrameworkPath($framework));
    }
}
