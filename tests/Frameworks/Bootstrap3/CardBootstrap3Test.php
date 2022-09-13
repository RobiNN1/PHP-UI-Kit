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

namespace Tests\Frameworks\Bootstrap3;

use Tests\Components\CardTest;

final class CardBootstrap3Test extends CardTest {
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
