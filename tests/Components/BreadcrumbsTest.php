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

        $this->assertComponentRenders($this->getFile('components/breadcrumbs'), $tpl);
    }
}
