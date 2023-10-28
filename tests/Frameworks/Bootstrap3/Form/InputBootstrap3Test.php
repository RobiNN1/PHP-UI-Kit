<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3\Form;

use RobiNN\UiKit\Tests\Components\Form\InputTestCase;

final class InputBootstrap3Test extends InputTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="form-group">
    <label for="test" class="form-label">Test</label>
    <input value="2" type="text" id="test" name="test" class="form-control" aria-label="Test">
</div>';
    }
}
