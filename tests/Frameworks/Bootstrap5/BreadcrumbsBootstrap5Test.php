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
