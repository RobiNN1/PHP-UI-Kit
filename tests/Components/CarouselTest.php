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

final class CarouselTest extends ComponentTestCase {
    public function testCarouselRender(): void {
        $tpl = $this->uikit->carousel->render('test', [
            'Slide 1',
            'Slide 2',
        ]);

        $this->assertComponentRender($this->getFile('components/carousel'), $tpl);
    }

    public function testCarouselInTwig(): void {
        $this->assertComponentRenderTpl('components/carousel', "{{ carousel('test', [
            'Slide 1',
            'Slide 2',
        ]) }}");
    }
}
