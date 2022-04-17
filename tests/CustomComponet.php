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

namespace Tests;

use RobiNN\UiKit\Components\Component;

final class CustomComponet extends Component {
    public function render(string $name): string {
        return 'Name: '.$name;
    }

    public function open(): string {
        return '<nav>';
    }

    public function close(): string {
        return '</nav>';
    }
}
