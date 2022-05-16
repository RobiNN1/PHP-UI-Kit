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

use Tests\Components\TabsTest;

final class TabsFomanticui2Test extends TabsTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div id="tabs-test">
    <div class="ui tabular menu">
        <div class="item active" data-tab="test-tab1">Tab 1</div>
        <div class="item" data-tab="test-tab2">Tab 2</div>
    </div>
    <div class="tab-content">
        <div class="ui tab active" data-tab="test-tab1">Content 1</div>
        <div class="ui tab" data-tab="test-tab2">Content 2</div>
    </div>
</div>';
    }
}
