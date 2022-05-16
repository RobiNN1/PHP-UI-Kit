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

namespace Tests\Frameworks\Fomanticui2;

use Tests\Components\AccordionTest;

final class AccordionFomanticui2Test extends AccordionTest {
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
