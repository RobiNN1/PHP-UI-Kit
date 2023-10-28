<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\CustomComponets;

use RobiNN\UiKit\Components\Component;

class RenderString extends Component {
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
