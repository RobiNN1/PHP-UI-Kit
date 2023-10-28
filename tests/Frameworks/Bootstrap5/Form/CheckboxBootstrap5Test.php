<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5\Form;

use RobiNN\UiKit\Tests\Components\Form\CheckboxTestCase;

final class CheckboxBootstrap5Test extends CheckboxTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div class="mb-1">
    <div class="form-check">
        <input value="0" type="checkbox" id="test" name="test" class="form-check-input">
        <label for="test" class="form-check-label">Test</label>
    </div>
</div>';

        $this->expected_multiple_tpl = '<div class="mb-1">
    <span>Test checkboxes</span>
    <div class="form-check">
        <input value="0" type="checkbox" id="test-multiple0" name="test-multiple[]" class="form-check-input" checked>
        <label for="test-multiple0" class="form-check-label">Checkbox 1</label>
    </div>
    <div class="form-check">
        <input value="1" type="checkbox" id="test-multiple1" name="test-multiple[]" class="form-check-input">
        <label for="test-multiple1" class="form-check-label">Checkbox 2</label>
    </div>
    <div class="form-check">
        <input value="2" type="checkbox" id="test-multiple2" name="test-multiple[]" class="form-check-input">
        <label for="test-multiple2" class="form-check-label">Checkbox 3</label>
    </div>
</div>';
    }
}
