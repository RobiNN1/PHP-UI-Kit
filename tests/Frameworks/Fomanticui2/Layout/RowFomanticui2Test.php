<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2\Layout;

use RobiNN\UiKit\Tests\Components\Layout\RowTestCase;

final class RowFomanticui2Test extends RowTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_open_tpl = '<div class="ui grid">
    <div class="ui stackable row">';
        $this->expected_close_tpl = '</div>
</div>';
    }
}
