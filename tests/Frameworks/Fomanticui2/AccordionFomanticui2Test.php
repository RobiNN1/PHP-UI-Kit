<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\AccordionTestCase;

final class AccordionFomanticui2Test extends AccordionTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui styled fluid accordion" id="accordion-test">
    <div class="title active"> <i class="dropdown icon"></i>Title 1</div>
    <div class="content active">Content 1</div>
    <div class="title"> <i class="dropdown icon"></i>Title 2</div>
    <div class="content">Content 2</div>
</div>';
    }
}
