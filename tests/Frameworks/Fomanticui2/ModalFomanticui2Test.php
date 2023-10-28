<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2;

use RobiNN\UiKit\Tests\Components\ModalTestCase;

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
