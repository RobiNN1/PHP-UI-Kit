<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\ListGroupTestCase;

final class ListGroupFomanticui2Test extends ListGroupTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui segments">
    <div class="ui segment">Item 1</div>
    <div class="ui segment">Item 2</div>
    <div class="ui segment"><a href="link.php">Link</a></div>
</div>';
    }
}
