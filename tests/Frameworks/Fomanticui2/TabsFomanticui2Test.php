<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\TabsTestCase;

final class TabsFomanticui2Test extends TabsTestCase {
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
