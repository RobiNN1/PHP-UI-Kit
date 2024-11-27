<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\BreadcrumbsTestCase;

final class BreadcrumbsFomanticui2Test extends BreadcrumbsTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui breadcrumb">
    <a class="section" href="link1.php">Link 1</a>
    <div class="divider"> / </div>
    <div class="active section">Link 2</div>
</div>';
    }
}
