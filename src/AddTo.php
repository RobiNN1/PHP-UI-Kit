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

class AddTo {
    /**
     * @var string
     */
    public static string $head = '';

    /**
     * @var string
     */
    public static string $footer = '';

    /**
     * @var string
     */
    public static string $js = '';

    /**
     * @var string
     */
    public static string $jquery = '';

    /**
     * @var string
     */
    public static string $css = '';

    /**
     * Append content to head.
     *
     * @param string $tag
     */
    public static function head(string $tag): void {
        if (!stristr(self::$head, $tag)) {
            self::$head .= $tag;
        }
    }

    /**
     * Append content to footer.
     *
     * @param string $tag
     */
    public static function footer(string $tag): void {
        if (!stristr(self::$footer, $tag)) {
            self::$footer .= $tag;
        }
    }

    /**
     * Add JS codes to the output.
     *
     * @param string $code
     */
    public static function js(string $code): void {
        if (!stristr(self::$js, $code)) {
            self::$js .= $code;
        }
    }

    /**
     * Add jQuery codes to the output.
     *
     * @param string $code
     */
    public static function jQuery(string $code): void {
        if (!stristr(self::$jquery, $code)) {
            self::$jquery .= $code;
        }
    }

    /**
     * Add CSS codes to the output.
     *
     * @param string $code
     */
    public static function css(string $code): void {
        if (!stristr(self::$css, $code)) {
            self::$css .= $code;
        }
    }
}
