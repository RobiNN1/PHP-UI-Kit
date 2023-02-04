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

namespace Tests\Frameworks\Bootstrap3\Form;

use Tests\Components\Form\CheckboxTestCase;

final class CheckboxBootstrap3Test extends CheckboxTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="form-group">
    <div class="checkbox">
        <label for="test">
            <input value="0" type="checkbox" id="test" name="test">
            Test 
        </label>
    </div>
</div>';

        $this->expected_multiple_tpl = '<div class="form-group">
    <span>Test checkboxes</span>
    <div class="checkbox">
        <label for="test-multiple0">
            <input value="0" type="checkbox" id="test-multiple0" name="test-multiple[]" checked>
            Checkbox 1 
        </label>
    </div>
    <div class="checkbox">
        <label for="test-multiple1">
            <input value="1" type="checkbox" id="test-multiple1" name="test-multiple[]">
            Checkbox 2 
        </label>
    </div>
    <div class="checkbox">
        <label for="test-multiple2">
            <input value="2" type="checkbox" id="test-multiple2" name="test-multiple[]">
            Checkbox 3 
        </label>
    </div>
</div>';
    }
}
