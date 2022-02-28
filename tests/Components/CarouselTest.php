<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components;

use Tests\ComponentTestCase;

final class CarouselTest extends ComponentTestCase {
    public function testCarouselRender(): void {
        $tpl = $this->uikit->carousel->render('test', [
            'Slide 1',
            'Slide 2',
        ]);

        $expected = '<div id="carousel-test" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-test" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carousel-test" data-bs-slide-to="1"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">Slide 1</div>
        <div class="carousel-item">Slide 2</div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-test" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-test" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
