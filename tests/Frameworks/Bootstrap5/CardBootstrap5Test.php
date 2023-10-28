<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5;

use RobiNN\UiKit\Tests\Components\CardTestCase;

final class CardBootstrap5Test extends CardTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div class="card">
    <div class="card-body">
        <h1>
            Title
        </h1>
        <p>Testing</p>
    </div>
</div>';
    }
}
