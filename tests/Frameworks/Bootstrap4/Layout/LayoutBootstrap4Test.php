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

namespace Tests\Frameworks\Bootstrap4\Layout;

use Tests\Components\Layout\LayoutTestCase;

final class LayoutBootstrap4Test extends LayoutTestCase {
    protected function setUp(string $framework = ''): void {
        parent::setUp('bootstrap4');

        $this->expected_framework = $this->uikit->config->getFramework();

        $this->expected_tpl = '<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>UI Kit</title>
    </head>
    <body>
bootstrap4 </body>
</html>';
    }
}
