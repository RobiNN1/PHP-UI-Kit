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

namespace Tests\Components;

use Tests\ComponentTestCase;

abstract class BreadcrumbsTest extends ComponentTestCase {
    protected string $expected_tpl;

    public function testBreadcrumbsRender(): void {
        $tpl = $this->uikit->breadcrumbs([
            'Link 1' => 'link1.php',
            'Link 2' => 'link2.php',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testBreadcrumbsInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ breadcrumbs({
            'Link 1': 'link1.php',
            'Link 2': 'link2.php',
        }) }}");
    }
}
