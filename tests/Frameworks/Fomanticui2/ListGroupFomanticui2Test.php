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

use Tests\Components\ListGroupTestCase;

final class ListGroupFomanticui2Test extends ListGroupTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui segments">
    <div class="ui segment">Item 1</div>
    <div class="ui segment">Item 2</div>
    <div class="ui segment"><a href="link.php">Link</a></div>
</div>';
    }
}
