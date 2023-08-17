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

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5\Form;

use RobiNN\UiKit\Tests\Components\Form\SelectTestCase;

final class SelectBootstrap5Test extends SelectTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_tpl = '<div class="mb-1">
    <label for="test" class="form-label">Test</label>
    <select id="test" name="test" class="form-select" aria-label="Test">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2" selected>item3</option>
    </select>
</div>';
    }
}
