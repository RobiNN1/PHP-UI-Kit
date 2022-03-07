<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit;

class OutputHandler {
    /**
     * @var string
     */
    public static string $pageHeadTags = '';

    /**
     * @var string
     */
    public static string $pageFooterTags = '';

    /**
     * @var string
     */
    public static string $jsCode = '';

    /**
     * @var string
     */
    public static string $jqueryCode = '';

    /**
     * @var string
     */
    public static string $cssCode = '';

    /**
     * Add content to the html head.
     *
     * @param string $tag
     */
    public static function addToHead(string $tag): void {
        if (!stristr(self::$pageHeadTags, $tag)) {
            self::$pageHeadTags .= $tag;
        }
    }

    /**
     * Add content to the footer.
     *
     * @param string $tag
     */
    public static function addToFooter(string $tag): void {
        if (!stristr(self::$pageFooterTags, $tag)) {
            self::$pageFooterTags .= $tag;
        }
    }

    /**
     * Add JS codes to the output.
     *
     * @param string $code
     */
    public static function addToJs(string $code): void {
        if (!stristr(self::$jsCode, $code)) {
            self::$jsCode .= $code;
        }
    }

    /**
     * Add jQuery codes to the output.
     *
     * @param string $code
     */
    public static function addToJQuery(string $code): void {
        if (!stristr(self::$jqueryCode, $code)) {
            self::$jqueryCode .= $code;
        }
    }

    /**
     * Add CSS codes to the output.
     *
     * @param string $code
     */
    public static function addToCss(string $code): void {
        if (!stristr(self::$cssCode, $code)) {
            self::$cssCode .= $code;
        }
    }
}
