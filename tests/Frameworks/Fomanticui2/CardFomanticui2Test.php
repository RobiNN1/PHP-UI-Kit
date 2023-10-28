<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\CardTestCase;

final class CardFomanticui2Test extends CardTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui fluid card">
    <div class="content">
        <h1>
            Title
        </h1>
        <p>Testing</p>
    </div>
</div>';
    }
}
