<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class BreadcrumbsTestCase extends ComponentTestCase {
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
