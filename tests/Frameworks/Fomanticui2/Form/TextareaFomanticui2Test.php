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

use Tests\Components\Form\TextareaTest;

final class TextareaFomanticui2Test extends TextareaTest {
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
