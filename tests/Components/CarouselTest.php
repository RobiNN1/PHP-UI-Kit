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

abstract class CarouselTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testCarouselRender(): void {
        $tpl = $this->uikit->carousel->render('test', [
            'Slide 1',
            'Slide 2',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->toHtml());
    }

    public function testCarouselInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ carousel('test', [
            'Slide 1',
            'Slide 2',
        ]) }}");
    }
}
