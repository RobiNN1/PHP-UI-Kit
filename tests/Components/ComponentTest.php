<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use ReflectionMethod;
use RobiNN\UiKit\Components\Component;
use RobiNN\UiKit\UiKit;

final class ComponentTest extends TestCase {
    private Component $component;

    /**
     * Call private method.
     *
     * @throws ReflectionException
     */
    private function callMethod(object $object, string $name, mixed ...$args): mixed {
        return (new ReflectionMethod($object, $name))->invokeArgs($object, $args);
    }

    protected function setUp(): void {
        $this->component = new Component();
    }

    /**
     * @throws ReflectionException
     */
    public function testGetAttributes(): void {
        $attributes = $this->callMethod($this->component, 'getAttributes', [
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

        $this->assertSame('value2', $this->callMethod($this->component, 'getOption', 'array', 'primary', 'test'));
    }
}
