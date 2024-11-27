<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\ProgressTestCase;

final class ProgressBootstrap3Test extends ProgressTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="progress">
    <div class="progress-bar" style="width: 27%;">27%</div>
</div>';
    }
}
