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

use Tests\ComponentTestCase;

abstract class CardTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testCardRender(): void {
        $tpl = $this->uikit->card([
            'body' => '<h1>Title</h1><p>Testing</p>',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testCardInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ card({
            'body': '<h1>Title</h1><p>Testing</p>',
        }) }}");
    }
}
