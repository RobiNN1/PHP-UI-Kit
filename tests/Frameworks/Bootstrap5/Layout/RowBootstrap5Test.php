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

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5\Layout;

use RobiNN\UiKit\Tests\Components\Layout\RowTestCase;

final class RowBootstrap5Test extends RowTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_open_tpl = '<div class="row">';
        $this->expected_close_tpl = '</div>';
    }
}
