<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2\Form;

use RobiNN\UiKit\Tests\Components\Form\InputTestCase;

final class InputFomanticui2Test extends InputTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="field">
    <label for="test">Test</label>
    <div class="ui input fluid">
        <input value="2" type="text" id="test" name="test" aria-label="Test">
    </div>
</div>';
    }
}
