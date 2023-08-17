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

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\TabsTestCase;

final class TabsBootstrap3Test extends TabsTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div id="tabs-test">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item active" role="presentation"> <a id="test-tab1-link" data-toggle="tab" data-target="#test-tab1" role="tab" aria-controls="test-tab1">Tab 1</a> </li>
        <li class="nav-item" role="presentation"> <a id="test-tab2-link" data-toggle="tab" data-target="#test-tab2" role="tab" aria-controls="test-tab2">Tab 2</a> </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="test-tab1" role="tabpanel" aria-labelledby="test-tab1-link">Content 1</div>
        <div class="tab-pane fade" id="test-tab2" role="tabpanel" aria-labelledby="test-tab2-link">Content 2</div>
    </div>
</div>';
    }
}
