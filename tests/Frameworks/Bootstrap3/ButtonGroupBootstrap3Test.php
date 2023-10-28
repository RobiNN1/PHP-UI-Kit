<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3;

use RobiNN\UiKit\Tests\Components\ButtonGroupTestCase;

final class ButtonGroupBootstrap3Test extends ButtonGroupTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="btn-group" role="group">
    <button type="button" class="btn btn-default" value="1">Yes</button>
    <button type="button" class="btn btn-default" value="0">No</button>
    <button type="button" class="btn btn-danger" value="delete">Delete</button>
    <button type="button" class="btn btn-default">No value 1</button>
    <button type="button" class="btn btn-default">No value 2</button>
</div>';
    }
}
