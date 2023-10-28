<?php
/**
 * This file is part of UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\CustomComponets;

use RobiNN\UiKit\Components\Component;

class TestTwig extends Component {
    protected string $component = '@tests/test_twig';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'option' => 'n\a',
    ];

    /**
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $default = 'idk', array $options = []): object {
        $this->uikit->addPath(__DIR__.'/templates', 'tests');

        $this->options($options);

        return $this->setTplData([
            'default' => $default,
        ]);
    }
}
