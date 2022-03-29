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

        $this->assertComponentRenders($this->getFile('components/card'), $tpl);
    }
}
