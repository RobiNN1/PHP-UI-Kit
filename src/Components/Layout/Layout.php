<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components\Layout;

use RobiNN\UiKit\Components\Component;
use RobiNN\UiKit\OutputHandler;

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

        if (!empty(OutputHandler::$jqueryCode) && $this->uikit->getFrameworkOptions('jquery')) {
            OutputHandler::addToJS('$(function(){'.OutputHandler::$jqueryCode.'});');
        }

        if (!empty(OutputHandler::$jsCode)) {
            OutputHandler::addToFooter('<script>'.OutputHandler::$jsCode.'</script>');
        }

        $css_codes = '';
        if (!empty(OutputHandler::$cssCode)) {
            $minify_css = function (string $css): string {
                $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
                $css = preg_replace('/\s{2,}/', ' ', $css);
                $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
                return preg_replace('/;}/', '}', $css);
            };

            $css_codes = '<style>'.$minify_css(OutputHandler::$cssCode).'</style>';
        }

        return $this->uikit->renderTpl('layout/layout', [
            'body'        => $body,
            'lang'        => $options['lang'],
            'title'       => $options['title'],
            'attributes'  => $this->getAttributes($options['attributes']),
            'head_tags'   => OutputHandler::$pageHeadTags,
            'css_codes'   => $css_codes,
            'footer_tags' => OutputHandler::$pageFooterTags,
        ]);
    }
}
