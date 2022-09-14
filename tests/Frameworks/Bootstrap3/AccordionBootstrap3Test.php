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

namespace Tests\Frameworks\Bootstrap3;

use Tests\Components\AccordionTest;

final class AccordionBootstrap3Test extends AccordionTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="panel-group" id="accordion-test">
    <div class="panel panel-default">
        <div class="panel-heading" >
            <h4 class="panel-title" id="heading-test1">
                <a type="button" data-toggle="collapse" data-target="#collapse-test1" aria-expanded="true" aria-controls="collapse-test1">Title 1</a> 
            </h4>
        </div>
        <div id="collapse-test1" class="panel-collapse collapse in" aria-labelledby="heading-test1" data-parent="#accordion-test">
            <div class="panel-body">Content 1</div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" >
            <h4 class="panel-title" id="heading-test2">
                <a class="collapsed" type="button" data-toggle="collapse" data-target="#collapse-test2" aria-expanded="true" aria-controls="collapse-test2">Title 2</a> 
            </h4>
        </div>
        <div id="collapse-test2" class="panel-collapse collapse" aria-labelledby="heading-test2" data-parent="#accordion-test">
            <div class="panel-body">Content 2</div>
        </div>
    </div>
</div>';
    }
}