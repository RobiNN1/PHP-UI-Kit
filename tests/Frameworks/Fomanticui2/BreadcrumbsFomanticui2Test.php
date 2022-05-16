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

use Tests\Components\BreadcrumbsTest;

final class BreadcrumbsFomanticui2Test extends BreadcrumbsTest {
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
