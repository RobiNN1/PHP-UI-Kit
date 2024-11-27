<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2\Form;

use RobiNN\UiKit\Tests\Components\Form\SelectTestCase;

final class SelectFomanticui2Test extends SelectTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="field">
    <label for="test">Test</label>
    <div class="fluid">
        <select id="test" name="test" aria-label="Test">
            <option value="0">item1</option>
            <option value="1">item2</option>
            <option value="2" selected>item3</option>
        </select>
    </div>
</div>';
    }
}
