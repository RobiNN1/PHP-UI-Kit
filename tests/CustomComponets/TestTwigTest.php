<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\CustomComponets;

use RobiNN\UiKit\Tests\ComponentTestCase;

final class TestTwigTest extends ComponentTestCase {
    protected string $expected_tpl;

    protected function setUp(): void {
        parent::setUp();
        $this->uikit->addComponent('test_twig', TestTwig::class);

        $this->expected_tpl = 'Default: idk, Option: n\a';
    }

    public function testCustomComponentRender(): void {
        $this->assertSame($this->expected_tpl, $this->uikit->test_twig()->__toString());

        $this->assertSame('Default: idk, Option: test', $this->uikit->test_twig()->options(['option' => 'test'])->__toString());
        $this->assertSame('Default: test1, Option: test2', $this->uikit->test_twig('test1')->options(['option' => 'test2'])->__toString());
    }

    public function testCustomComponentInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, '{{ test_twig() }}');
    }
}
