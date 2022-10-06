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
use RobiNN\UiKit\Config;
use RobiNN\UiKit\UiKit;
use Tests\ComponentTestCase;

abstract class LayoutTest extends ComponentTestCase {
    protected string $expected_tpl;
    protected string $expected_framework;

    protected function setUp(string $framework = ''): void {
        $this->uikit = new UiKit(new Config(['framework' => $framework]));

        // hide files and scripts that can be changed frequently
        AddTo::$head = ['before' => '', 'after' => '', 'end' => ''];
        AddTo::$js = '';
        AddTo::$css = '';
        AddTo::$footer = ['before' => '', 'after' => '', 'end' => ''];
    }

    public function testLayoutRender(): void {
        $tpl = $this->uikit->layout->render($this->expected_framework)->toHtml();
        $tpl = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $tpl);

        $this->assertComponentRender($this->expected_tpl, $tpl);
    }

    public function testLayoutInTwig(): void {
        $tpl = $this->uikit->render('{{ layout(framework) }}', [
            'framework' => $this->expected_framework,
        ], true);
        $tpl = (string) preg_replace('#<script(.*?)>(.*?)</script>#is', '', $tpl);

        $this->assertComponentRenderTpl($this->expected_tpl, $tpl);
    }
}
