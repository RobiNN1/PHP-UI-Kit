<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Frameworks\Bootstrap5\Layout;

use RobiNN\UiKit\Tests\Components\Layout\LayoutTestCase;

final class LayoutBootstrap5Test extends LayoutTestCase {
    protected function setUp(string $framework = ''): void {
        parent::setUp('bootstrap5');

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
