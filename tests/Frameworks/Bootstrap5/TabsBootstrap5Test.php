<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5;

use RobiNN\UiKit\Tests\Components\TabsTestCase;

final class TabsBootstrap5Test extends TabsTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div id="tabs-test">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="test-tab1-link" data-bs-toggle="tab" data-bs-target="#test-tab1" type="button" role="tab" aria-controls="test-tab1">Tab 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="test-tab2-link" data-bs-toggle="tab" data-bs-target="#test-tab2" type="button" role="tab" aria-controls="test-tab2">Tab 2</button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="test-tab1" role="tabpanel" aria-labelledby="test-tab1-link">Content 1</div>
        <div class="tab-pane fade" id="test-tab2" role="tabpanel" aria-labelledby="test-tab2-link">Content 2</div>
    </div>
</div>';
    }
}
