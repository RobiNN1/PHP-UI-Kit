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

use RobiNN\UiKit\Config;
use PHPUnit\Framework\TestCase;

final class ConfigTest extends TestCase {
    private Config $config;

    public function __construct() {
        parent::__construct();

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
