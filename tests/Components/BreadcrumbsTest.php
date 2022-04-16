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

final class BreadcrumbsTest extends ComponentTestCase {
    public string $expectedTpl = '<ol class="breadcrumb" aria-label="breadcrumb">
    <li class="breadcrumb-item"><a href="link1.php">Link 1</a></li>
    <li class="breadcrumb-item active" aria-current="page">Link 2</li>
</ol>';

    public function testBreadcrumbsRender(): void {
        $tpl = $this->uikit->breadcrumbs->render([
            'Link 1' => 'link1.php',
            'Link 2' => 'link2.php',
        ]);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testBreadcrumbsInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ breadcrumbs({
            'Link 1': 'link1.php',
            'Link 2': 'link2.php',
        }) }}");
    }
}
