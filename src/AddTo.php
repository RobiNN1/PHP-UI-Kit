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
     * @var array<string, string>
     */
    public static array $head = ['before' => '', 'after' => '', 'end' => '']; // `end` is for internal purposes

    /**
     * @var array<string, string>
     */
    public static array $footer = ['before' => '', 'after' => '', 'end' => '']; // `end` is for internal purposes

    public static string $js = '';

    public static string $css = '';

    /**
     * Append content to head.
     *
     * @param string $tag
     * @param string $order
     */
    public static function head(string $tag, string $order = 'after'): void {
        $order = in_array($order, ['before', 'after', 'end'], true) ? $order : 'after';

        if (stripos(self::getHeadTags(), $tag) === false) {
            self::$head[$order] .= $tag;
        }
    }

    /**
     * Get all header tags.
     *
     * @return string
     */
    public static function getHeadTags(): string {
        return self::$head['before'].self::$head['after'].self::$head['end'];
    }

    /**
     * Append content to footer.
     *
     * @param string $tag
     * @param string $order
     */
    public static function footer(string $tag, string $order = 'after'): void {
        $order = in_array($order, ['before', 'after', 'end'], true) ? $order : 'after';

        if (stripos(self::getFooterTags(), $tag) === false) {
            self::$footer[$order] .= $tag;
        }
    }

    /**
     * Get all footer tags.
     *
     * @return string
     */
    public static function getFooterTags(): string {
        return self::$footer['before'].self::$footer['after'].self::$footer['end'];
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
