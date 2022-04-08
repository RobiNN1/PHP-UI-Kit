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

final class PaginationTest extends ComponentTestCase {
    public function testPaginationRender(): void {
        $tpl = $this->uikit->pagination->render(range(1, 5), [
            'link'     => 'page.php?p=%s',
            'current'  => 3,
            'disabled' => 'prev',
        ]);

        $this->assertComponentRender($this->getFile('components/pagination'), $tpl);
    }

    public function testPaginationInTwig(): void {
        $this->assertComponentRenderTpl('components/pagination', "{{ pagination(range(1, 5), {
            'link': 'page.php?p=%s',
            'current': 3,
            'disabled': 'prev',
        }) }}");
    }
}
