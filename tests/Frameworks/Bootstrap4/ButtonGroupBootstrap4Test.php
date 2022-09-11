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

use Tests\Components\ButtonGroupTest;

final class ButtonGroupBootstrap4Test extends ButtonGroupTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="btn-group" role="group">
    <button type="button" class="btn btn-secondary" value="1">Yes</button>
    <button type="button" class="btn btn-secondary" value="0">No</button>
    <button type="button" class="btn btn-danger" value="delete">Delete</button>
    <button type="button" class="btn btn-secondary">No value 1</button>
    <button type="button" class="btn btn-secondary">No value 2</button>
</div>';
    }
}
