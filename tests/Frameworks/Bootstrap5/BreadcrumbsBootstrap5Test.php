<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5;

use RobiNN\UiKit\Tests\Components\BreadcrumbsTestCase;

final class BreadcrumbsBootstrap5Test extends BreadcrumbsTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<ol class="breadcrumb" aria-label="breadcrumb">
    <li class="breadcrumb-item"><a href="link1.php">Link 1</a></li>
    <li class="breadcrumb-item active" aria-current="page">Link 2</li>
</ol>';
    }
}
