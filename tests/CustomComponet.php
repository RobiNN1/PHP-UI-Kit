<?php
/**
 * This file is part of Uikit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

final class CustomComponet {
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