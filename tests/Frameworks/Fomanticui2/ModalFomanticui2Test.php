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

namespace Tests\Frameworks\Fomanticui2;

use Tests\Components\ModalTestCase;

final class ModalFomanticui2Test extends ModalTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_tpl = '<div class="ui tiny modal" id="modal-test">
    <i class="close icon"></i>
    <div class="header"> Modal Title </div>
    <div class="content"><b>Testing</b></div>
    <div class="actions">Random text...</div>
</div>';
    }
}
