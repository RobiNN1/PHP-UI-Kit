<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5;

use RobiNN\UiKit\Tests\Components\AccordionTestCase;

final class AccordionBootstrap5Test extends AccordionTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div class="accordion" id="accordion-test">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-test1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-test1" aria-expanded="true" aria-controls="collapse-test1">Title 1</button>
        </h2>
        <div id="collapse-test1" class="accordion-collapse collapse show" aria-labelledby="heading-test1" data-bs-parent="#accordion-test">
            <div class="accordion-body">Content 1</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-test2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-test2" aria-expanded="true" aria-controls="collapse-test2">Title 2</button>
        </h2>
        <div id="collapse-test2" class="accordion-collapse collapse" aria-labelledby="heading-test2" data-bs-parent="#accordion-test">
            <div class="accordion-body">Content 2</div>
        </div>
    </div>
</div>';
    }
}
