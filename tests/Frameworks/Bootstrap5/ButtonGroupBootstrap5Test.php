<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5;

use RobiNN\UiKit\Tests\Components\ButtonGroupTestCase;

final class ButtonGroupBootstrap5Test extends ButtonGroupTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div class="btn-group" role="group">
    <button type="button" class="btn btn-secondary" value="1">Yes</button>
    <button type="button" class="btn btn-secondary" value="0">No</button>
    <button type="button" class="btn btn-danger" value="delete">Delete</button>
    <button type="button" class="btn btn-secondary">No value 1</button>
    <button type="button" class="btn btn-secondary">No value 2</button>
</div>';
    }
}
