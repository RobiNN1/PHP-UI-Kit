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

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\ButtonGroupTestCase;

final class ButtonGroupFomanticui2Test extends ButtonGroupTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui buttons">
    <button type="button" class="ui button gery" value="1">Yes</button>
    <button type="button" class="ui button gery" value="0">No</button>
    <button type="button" class="ui button negative" value="delete">Delete</button>
    <button type="button" class="ui button gery">No value 1</button>
    <button type="button" class="ui button gery">No value 2</button>
</div>';
    }
}
