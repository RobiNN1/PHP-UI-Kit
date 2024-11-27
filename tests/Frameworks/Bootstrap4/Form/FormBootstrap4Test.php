<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap4\Form;

use RobiNN\UiKit\Tests\Components\Form\FormTestCase;

final class FormBootstrap4Test extends FormTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap4');

        $this->expected_open_tpl = '<form method="get">';
        $this->expected_close_tpl = '</form>';
    }
}
