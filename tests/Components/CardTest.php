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

final class CardTest extends ComponentTestCase {
    public function testCardRender(): void {
        $tpl = $this->uikit->card->render([
            'body' => '
                 <h1>Title</h1>
                 <p>Testing</p>
             ',
        ]);

        $expected = '<div class="card">
    <div class="card-body">
        <h1>
            Title
        </h1>
        <p class="card-text">Testing</p>
    </div>
</div>';

        $this->assertComponentRenders($expected, $tpl);
    }
}
