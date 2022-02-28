<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components;

use Tests\ComponentTestCase;

final class BreadcrumbsTest extends ComponentTestCase {
    public function testBreadcrumbsRender(): void {
        $tpl = $this->uikit->breadcrumbs->render([
            'Link 1' => 'link1.php',
            'Link 2' => 'link2.php',
        ]);

        $expected = '<ol class="breadcrumb" aria-label="breadcrumb">
    <li class="breadcrumb-item"><a href="link1.php">Link 1</a></li>
    <li class="breadcrumb-item active" aria-current="page">Link 2</li>
</ol>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
