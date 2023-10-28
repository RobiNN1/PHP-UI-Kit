<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\CarouselTestCase;

final class CarouselBootstrap3Test extends CarouselTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div id="carousel-test" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-test" data-slide-to="0" class="active" aria-current="true"></li>
        <li data-target="#carousel-test" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">Slide 1</div>
        <div class="item">Slide 2</div>
    </div>
    <a class="left carousel-control" href="#carousel-test" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
    <a class="right carousel-control" href="#carousel-test" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
</div>';
    }
}
