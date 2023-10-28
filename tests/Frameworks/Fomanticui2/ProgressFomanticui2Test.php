<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\ProgressTestCase;

final class ProgressFomanticui2Test extends ProgressTestCase {
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
