<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2\Form;

use RobiNN\UiKit\Tests\Components\Form\TextareaTestCase;

final class TextareaFomanticui2Test extends TextareaTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="field">
    <label for="test">Test</label>
    <div class="fluid">
        <textarea id="test" name="test" rows="4"></textarea>
    </div>
</div>';
    }
}
