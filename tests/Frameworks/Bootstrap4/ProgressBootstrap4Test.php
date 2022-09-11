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

use Tests\Components\ProgressTest;

final class ProgressBootstrap4Test extends ProgressTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="progress mb-2">
    <div class="progress-bar" style="width: 27%;">27%</div>
</div>';
    }
}
