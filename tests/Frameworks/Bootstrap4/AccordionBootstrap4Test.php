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

use Tests\Components\AccordionTest;

final class AccordionBootstrap4Test extends AccordionTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="accordion" id="accordion-test">
    <div class="card">
        <div class="card-header" id="heading-test1">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-test1" aria-expanded="true" aria-controls="collapse-test1">Title 1</button>
            </h2>
        </div>
        <div id="collapse-test1" class="collapse show" aria-labelledby="heading-test1" data-parent="#accordion-test">
            <div class="card-body">Content 1</div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="heading-test2">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-test2" aria-expanded="true" aria-controls="collapse-test2">Title 2</button>
            </h2>
        </div>
        <div id="collapse-test2" class="collapse" aria-labelledby="heading-test2" data-parent="#accordion-test">
            <div class="card-body">Content 2</div>
        </div>
    </div>
</div>';
    }
}