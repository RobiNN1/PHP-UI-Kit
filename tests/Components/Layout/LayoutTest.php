<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Components\Layout;

use Tests\ComponentTestCase;

final class LayoutTest extends ComponentTestCase {
    protected string $expected_tpl = '<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UI Kit</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        test

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>';

    public function testLayoutRender(): void {
        $tpl = $this->uikit->layout->render('test');

        $this->assertComponentRender($this->expected_tpl, $tpl);
    }

    public function testLayoutInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ layout('test') }}");
    }
}
