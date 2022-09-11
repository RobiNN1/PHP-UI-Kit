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

namespace Tests\Frameworks\Bootstrap4;

use Tests\Components\AlertTest;

final class AlertBootstrap4Test extends AlertTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="alert alert-primary" role="alert">Default</div>';
    }
}
