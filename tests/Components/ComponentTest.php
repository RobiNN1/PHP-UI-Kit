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

namespace Tests\Components;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use ReflectionMethod;
use RobiNN\UiKit\Components\Component;
use RobiNN\UiKit\UiKit;

final class ComponentTest extends TestCase {
    private Component $component;

    protected function setUp(): void {
        $this->component = new Component();
    }

    /**
     * Call private method.
     *
     * @throws ReflectionException
     */
    protected static function callMethod(object $object, string $name, mixed ...$args): mixed {
        return (new ReflectionMethod($object, $name))->invokeArgs($object, $args);
    }

    /**
     * @throws ReflectionException
     */
    public function testGetAttributes(): void {
        $attributes = self::callMethod($this->component, 'getAttributes', [
            'no_value'     => null,
            'zero'         => 0,
            'one'          => 1,
            'string'       => 'test',
            'empty-string' => '',
        ]);

        $this->assertSame('no_value zero="0" one="1" string="test" empty-string=""', $attributes);
    }

    /**
     * @throws ReflectionException
     */
    public function testGetOption(): void {
        $this->component->uikit = new UiKit();
        $this->component->uikit->setFrameworkOption('test', [
            'array' => [
                'default' => 'value1',
                'primary' => 'value2',
            ],
        ]);

        $this->assertSame('value2', self::callMethod($this->component, 'getOption', 'array', 'primary', 'test'));
    }
}
