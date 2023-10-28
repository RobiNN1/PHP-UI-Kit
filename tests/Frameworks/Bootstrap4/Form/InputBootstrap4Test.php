<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4\Form;

use RobiNN\UiKit\Tests\Components\Form\InputTestCase;

final class InputBootstrap4Test extends InputTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <input value="2" type="text" id="test" name="test" class="form-control" aria-label="Test">
</div>';
    }
}
