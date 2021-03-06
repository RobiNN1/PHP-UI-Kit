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

namespace Tests\Frameworks\Bootstrap5\Form;

use Tests\Components\Form\TextareaTest;

final class TextareaBootstrap5Test extends TextareaTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <textarea id="test" name="test" rows="4" class="form-control"></textarea>
</div>';
    }
}
