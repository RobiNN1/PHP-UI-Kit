<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Fomanticui2\Form;

use RobiNN\UiKit\Tests\Components\Form\FormTestCase;

final class FormFomanticui2Test extends FormTestCase {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('fomanticui2');

        $this->expected_open_tpl = '<form class="ui form" method="get">';
        $this->expected_close_tpl = '</form>';
    }
}
