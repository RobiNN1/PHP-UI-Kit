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

use Tests\Components\Form\FormTest;

final class FormBootstrap5Test extends FormTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->config->setFramework('bootstrap5');

        $this->expected_open_tpl = '<form method="get">';
        $this->expected_close_tpl = '</form>';
    }
}
