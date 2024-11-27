<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4\Form;

use RobiNN\UiKit\Tests\Components\Form\CheckboxTestCase;

final class CheckboxBootstrap4Test extends CheckboxTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="mb-1">
    <div class="custom-control custom-checkbox form-check">
        <input value="0" type="checkbox" id="test" name="test" class="custom-control-input">
        <label for="test" class="custom-control-label">Test</label>
    </div>
</div>';

        $this->expected_multiple_tpl = '<div class="mb-1">
    <span>Test checkboxes</span>
    <div class="custom-control custom-checkbox form-check">
        <input value="0" type="checkbox" id="test-multiple0" name="test-multiple[]" class="custom-control-input" checked>
        <label for="test-multiple0" class="custom-control-label">Checkbox 1</label>
    </div>
    <div class="custom-control custom-checkbox form-check">
        <input value="1" type="checkbox" id="test-multiple1" name="test-multiple[]" class="custom-control-input">
        <label for="test-multiple1" class="custom-control-label">Checkbox 2</label>
    </div>
    <div class="custom-control custom-checkbox form-check">
        <input value="2" type="checkbox" id="test-multiple2" name="test-multiple[]" class="custom-control-input">
        <label for="test-multiple2" class="custom-control-label">Checkbox 3</label>
    </div>
</div>';
    }
}
