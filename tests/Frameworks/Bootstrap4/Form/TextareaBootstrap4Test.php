<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4\Form;

use RobiNN\UiKit\Tests\Components\Form\TextareaTestCase;

final class TextareaBootstrap4Test extends TextareaTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_tpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <textarea id="test" name="test" rows="4" class="form-control"></textarea>
</div>';
    }
}
