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
use RobiNN\UiKit\UiKit;

final class CustomComponetTest extends TestCase {
    private UiKit $uikit;

    protected function setUp(): void {
        $this->uikit = new UiKit();
        $this->uikit->addComponent('custom_componet', CustomComponet::class);
    }

    public function testCustomComponentProperty(): void {
        $this->assertSame('Name: test', $this->uikit->custom_componet->render('test'));

        $this->assertSame('<nav>', $this->uikit->custom_componet->open());
        $this->assertSame('</nav>', $this->uikit->custom_componet->close());
    }

    public function testCustomComponentMethods(): void {
        $this->assertSame('Name: test', $this->uikit->custom_componet('test'));

        $this->assertSame('<nav>', $this->uikit->custom_componet_open());
        $this->assertSame('</nav>', $this->uikit->custom_componet_close());
    }

    public function testCustomComponentInTwig(): void {
        $this->assertSame('Name: test', $this->uikit->render('{{ custom_componet(\'test\') }}', [], true));
        $this->assertSame('<nav>', $this->uikit->render('{{ custom_componet_open() }}', [], true));
        $this->assertSame('</nav>', $this->uikit->render('{{ custom_componet_close() }}', [], true));
    }
}
