<?php
/**
 * This file is part of Uikit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Frameworks\Bootstrap4;

use Tests\Components\CarouselTest;

final class CarouselBootstrap4Test extends CarouselTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div id="carousel-test" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-test" data-slide-to="0" class="active" aria-current="true"></li>
        <li data-target="#carousel-test" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">Slide 1</div>
        <div class="carousel-item">Slide 2</div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carousel-test" data-slide="prev"><span class="carousel-control-prev-icon"></span></button>
    <button class="carousel-control-next" type="button" data-target="#carousel-test" data-slide="next"><span class="carousel-control-next-icon"></span></button>
</div>';
    }
}
