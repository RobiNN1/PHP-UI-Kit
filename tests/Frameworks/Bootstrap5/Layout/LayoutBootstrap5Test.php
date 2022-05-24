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

namespace Tests\Frameworks\Bootstrap5\Layout;

use RobiNN\UiKit\Config;
use Tests\Components\Layout\LayoutTest;

final class LayoutBootstrap5Test extends LayoutTest {
    protected function setUp(): void {
        parent::setUp();
        $this->uikit->init(new Config(['framework' => 'bootstrap5']));

        $this->expected_framework = $this->uikit->config->getFramework();

        $this->expected_tpl = '<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UI Kit</title>
    </head>
    <body>
bootstrap5 </body>
</html>';
    }
}
