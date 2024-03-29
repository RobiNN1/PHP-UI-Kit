<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap3\Form;

use RobiNN\UiKit\Tests\Components\Form\TextareaTestCase;

final class TextareaBootstrap3Test extends TextareaTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="form-group">
    <label for="test" class="form-label">Test</label>
    <textarea id="test" name="test" rows="4" class="form-control"></textarea>
</div>';
    }
}
