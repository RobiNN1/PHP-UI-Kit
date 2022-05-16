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

namespace Tests\Frameworks\Fomanticui2;

use Tests\Components\ProgressTest;

final class ProgressFomanticui2Test extends ProgressTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui progress" data-percent>
    <div class="bar blue" style="width: 27%;">
        <div class="progress centered">27%</div>
    </div>
</div>';
    }
}
