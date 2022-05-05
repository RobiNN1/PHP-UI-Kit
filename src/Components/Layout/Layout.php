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
    /**
     * Render site layout.
     *
     * @param string $body    Site content.
     * @param array  $options Additional options.
     *
     * @return string
     */
    public function render(string $body, array $options = []): string {
        $options = array_merge([
            'lang'       => 'en', // Site lang (used for html lang attribute).
            'title'      => 'UI Kit', // Site title.
            'attributes' => [], // Array of custom attributes.
        ], $options);

        if (!empty(AddTo::$jquery) && $this->uikit->getFrameworkOptions('jquery')) {
            AddTo::js('$(function(){'.AddTo::$jquery.'});');
        }

        if (!empty(AddTo::$js)) {
            AddTo::footer('<script>'.AddTo::$js.'</script>');
        }

        $css_codes = '';
        if (!empty(AddTo::$css)) {
            $minify_css = static function (string $css): string {
                $regexs = [
                    '/\/\*((?!\*\/).)*\*\//' => '',
                    '/\s{2,}/'               => ' ',
                    '/\s*([:;{}])\s*/'       => '$1',
                    '/;}/'                   => '}',
                ];

                foreach ($regexs as $regex => $replace) {
                    $css = preg_replace($regex, $replace, $css);
                }

                return $css;
            };

            $css_codes = '<style>'.$minify_css(AddTo::$css).'</style>';
        }

        return $this->uikit->render('layout/layout', [
            'body'        => $body,
            'lang'        => $options['lang'],
            'title'       => $options['title'],
            'attributes'  => $this->getAttributes($options['attributes']),
            'head_tags'   => AddTo::$head,
            'css_codes'   => $css_codes,
            'footer_tags' => AddTo::$footer,
        ]);
    }
}
