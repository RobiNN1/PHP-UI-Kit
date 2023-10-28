<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4\Form;

use RobiNN\UiKit\Tests\Components\Form\SelectTestCase;

final class SelectBootstrap4Test extends SelectTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <select id="test" name="test" class="custom-select" aria-label="Test">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2" selected>item3</option>
    </select>
</div>';
    }
}
