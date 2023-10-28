<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\AccordionTestCase;

final class AccordionBootstrap3Test extends AccordionTestCase {
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
