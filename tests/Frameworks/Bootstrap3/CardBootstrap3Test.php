<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\CardTestCase;

final class CardBootstrap3Test extends CardTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="panel panel-default">
    <div class="panel-body">
        <h1>
            Title
        </h1>
        <p>Testing</p>
    </div>
</div>';
    }
}
