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

namespace Tests\Components\Layout;

use RobiNN\UiKit\AddTo;
use Tests\ComponentTestCase;

abstract class LayoutTest extends ComponentTestCase {
    protected string $expected_tpl;
    protected string $expected_framework;

    protected function setUp(): void {
        parent::setUp();

        // hide files and scripts that can be changed frequently
        $this->uikit->setFrameworkOption('files', ['css' => [], 'js' => []]);
        $this->uikit->setFrameworkOption('jquery', false);
        AddTo::$head = '';
        AddTo::$css = '';
        AddTo::$footer = '';
    }

    public function testLayoutRender(): void {
        $tpl = $this->uikit->layout->render($this->expected_framework);
        $tpl = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $tpl);

        $this->assertComponentRender($this->expected_tpl, $tpl);
    }

    public function testLayoutInTwig(): void {
        $tpl = $this->uikit->render('{{ layout(framework) }}', [
            'framework' => $this->expected_framework,
        ], true);
        $tpl = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $tpl);

        $this->assertComponentRenderTpl($this->expected_tpl, $tpl);
    }
}
