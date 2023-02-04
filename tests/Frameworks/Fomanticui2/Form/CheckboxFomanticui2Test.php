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

namespace Tests\Frameworks\Fomanticui2\Form;

use Tests\Components\Form\CheckboxTestCase;

final class CheckboxFomanticui2Test extends CheckboxTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="grouped fields">
    <div class="field">
        <div class="ui checkbox">
            <input value="0" type="checkbox" id="test" name="test">
            <label for="test">Test</label>
        </div>
    </div>
</div>';

        $this->expected_multiple_tpl = '<div class="grouped fields">
    <span>Test checkboxes</span>
    <div class="field">
        <div class="ui checkbox">
            <input value="0" type="checkbox" id="test-multiple0" name="test-multiple[]" checked>
            <label for="test-multiple0">Checkbox 1</label>
        </div>
    </div>
    <div class="field">
        <div class="ui checkbox">
            <input value="1" type="checkbox" id="test-multiple1" name="test-multiple[]">
            <label for="test-multiple1">Checkbox 2</label>
        </div>
    </div>
    <div class="field">
        <div class="ui checkbox">
            <input value="2" type="checkbox" id="test-multiple2" name="test-multiple[]">
            <label for="test-multiple2">Checkbox 3</label>
        </div>
    </div>
</div>';
    }
}
