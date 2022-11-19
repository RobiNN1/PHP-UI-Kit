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

namespace RobiNN\UiKit\Components\Layout;

use RobiNN\UiKit\AddTo;
use RobiNN\UiKit\Components\Component;

class Layout extends Component {
    protected string $component = 'layout/layout';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'lang'       => 'en', // Site lang (used for html lang attribute).
        'title'      => 'UI Kit', // Site title.
        'attributes' => [], // Array of custom attributes.
        'minify_css' => true, // Minify CSS code.
    ];

    /**
     * Render site layout.
     *
     * @param string               $body    Site content.
     * @param array<string, mixed> $options Additional options.
     */
    public function render(string $body, array $options = []): Component {
        $this->options($options);

        $this->loadFrameworkAssets();
        $this->loadScripts();

        return $this->setTplData([
            'body'        => $body,
            'head_tags'   => AddTo::getHeadTags(),
            'footer_tags' => AddTo::getFooterTags(),
        ]);
    }

    private function loadFrameworkAssets(): void {
        $assets = $this->uikit->getFrameworkOption('files');

        foreach ($assets['css'] as $css) {
            AddTo::head('<link rel="stylesheet" href="'.$css.'">', 'before');
        }

        foreach ($assets['js'] as $js) {
            AddTo::footer('<script src="'.$js.'"></script>', 'before');
        }
    }

    private function loadScripts(): void {
        if (AddTo::$js !== '') {
            AddTo::footer('<script>'.AddTo::$js.'</script>', 'end');
        }

        if (AddTo::$css !== '') {
            $minify_css = static fn (string $css): string => (string) preg_replace(
                ['/\/\*((?!\*\/).)*\*\//', '/\s{2,}/', '/\s*([:;{}])\s*/', '/;}/'],
                ['', ' ', '$1', '}'],
                $css
            );

            AddTo::head('<style>'.($this->options['minify_css'] ? $minify_css(AddTo::$css) : AddTo::$css).'</style>', 'end');
        }
    }
}
