<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5;

use RobiNN\UiKit\Tests\Components\CarouselTestCase;

final class CarouselBootstrap5Test extends CarouselTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div id="carousel-test" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-test" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carousel-test" data-bs-slide-to="1"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">Slide 1</div>
        <div class="carousel-item">Slide 2</div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-test" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-test" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
</div>';
    }
}
