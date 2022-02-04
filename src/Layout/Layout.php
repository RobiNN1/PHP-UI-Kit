<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Layout;

use RobiNN\UiKit\OutputHandler;
use RobiNN\UiKit\UiKit;

class Layout {
    /**
     * @param UiKit  $uikit
     * @param string $body
     * @param array  $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, string $body, array $options = []): string {
        $options = array_merge([
            'lang'  => 'en', // Page lang.
            'title' => 'Ui Kit', // Page title.
            'body'  => $body // Body conetnt.
        ], $options);

        if (!empty(OutputHandler::$jsCode)) {
            OutputHandler::addToFooter('<script>'.OutputHandler::$jsCode.'</script>');
        }

        if (!empty(OutputHandler::$jqueryCode) && $uikit->getFrameworkOptions('jquery')) {
            OutputHandler::addToFooter('<script>$(function(){'.OutputHandler::$jqueryCode.'});</script>');
        }

        $context = [
            'lang'        => $options['lang'],
            'title'       => $options['title'],
            'body'        => $options['body'],
            'head_tags'   => OutputHandler::$pageHeadTags,
            'footer_tags' => OutputHandler::$pageFooterTags
        ];

        return $uikit->render('layout/layout', $context);
    }
}
