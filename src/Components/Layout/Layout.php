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
     * @param string $body
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(string $body, array $options = []): string {
        $options = array_merge([
            'lang'       => 'en', // Page lang.
            'title'      => 'UI Kit', // Page title.
            'body'       => $body, // Body conetnt.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
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

        $context = [
            'lang'        => $options['lang'],
            'title'       => $options['title'],
            'body'        => $options['body'],
            'attributes'  => $this->getAttributes($options['attributes']),
            'head_tags'   => OutputHandler::$pageHeadTags,
            'css_codes'   => $css_codes,
            'footer_tags' => OutputHandler::$pageFooterTags,
        ];

        return $this->uikit->renderTpl('layout/layout', $context);
    }
}
