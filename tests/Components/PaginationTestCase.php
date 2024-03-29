<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class PaginationTestCase extends ComponentTestCase {
    protected string $expected_tpl;

    public function testPaginationRender(): void {
        $tpl = $this->uikit->pagination(range(1, 5), [
            'link'     => 'page.php?p=%s',
            'current'  => 3,
            'disabled' => 'prev',
        ]);

        $this->assertComponentRender($this->expected_tpl, $tpl->__toString());
    }

    public function testPaginationInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_tpl, "{{ pagination(range(1, 5), {
            'link': 'page.php?p=%s',
            'current': 3,
            'disabled': 'prev',
        }) }}");
    }
}
