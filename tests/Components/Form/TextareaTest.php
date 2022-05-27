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

namespace Tests\Components\Form;

use Tests\ComponentTestCase;

abstract class TextareaTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testTextareaRender(): void {
        $tpl = $this->uikit->textarea->render('test', 'Test');

        $this->assertComponentRender($this->expected_tpl, $tpl);
    }

    public function testTextareaInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, '{{ textarea(\'test\', \'Test\') }}');
    }
}
