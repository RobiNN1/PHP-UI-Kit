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

use Tests\Components\Form\SelectTest;

final class SelectBootstrap3Test extends SelectTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap3');

        $this->expected_tpl = '<div class="form-group">
    <label for="test" class="form-label">Test</label>
    <select id="test" name="test" class="form-control" aria-label="Test">
        <option value="0">item1</option>
        <option value="1">item2</option>
        <option value="2" selected>item3</option>
    </select>
</div>';
    }
}
