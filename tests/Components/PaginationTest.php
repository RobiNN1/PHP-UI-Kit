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

abstract class PaginationTest extends ComponentTestCase {
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
