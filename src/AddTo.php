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
    public static string $css = '';

    /**
     * Append content to head.
     *
     * @param string $tag
     */
    public static function head(string $tag): void {
        if (stripos(self::$head, $tag) === false) {
            self::$head .= $tag;
        }
    }

    /**
     * Append content to footer.
     *
     * @param string $tag
     */
    public static function footer(string $tag): void {
        if (stripos(self::$footer, $tag) === false) {
            self::$footer .= $tag;
        }
    }

    /**
     * Add JS codes to the output.
     *
     * @param string $code
     */
    public static function js(string $code): void {
        if (stripos(self::$js, $code) === false) {
            self::$js .= $code;
        }
    }

    /**
     * Add CSS codes to the output.
     *
     * @param string $code
     */
    public static function css(string $code): void {
        if (stripos(self::$css, $code) === false) {
            self::$css .= $code;
        }
    }
}
