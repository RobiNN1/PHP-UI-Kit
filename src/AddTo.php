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
     * @interal
     */
    public static string $js = '';

    /**
     * @interal
     */
    public static string $css = '';

    /**
     * @var bool Set true to remove everything, so it's easy to test.
     *
     * @interal
     */
    public static bool $tests = false;

    /**
     * @var array<string, string>
     */
    private static array $head = ['before' => '', 'after' => '', 'end' => '']; // `end` is for internal purposes

    /**
     * @var array<string, string>
     */
    private static array $footer = ['before' => '', 'after' => '', 'end' => '']; // `end` is for internal purposes

    /**
     * Append content to head.
     */
    public static function head(string $tag, string $order = 'after'): void {
        $order = in_array($order, ['before', 'after', 'end'], true) ? $order : 'after';

        if (stripos(self::$head[$order], $tag) === false) {
            self::$head[$order] .= $tag;
        }
    }

    /**
     * Append content to footer.
     */
    public static function footer(string $tag, string $order = 'after'): void {
        $order = in_array($order, ['before', 'after', 'end'], true) ? $order : 'after';

        if (stripos(self::$footer[$order], $tag) === false) {
            self::$footer[$order] .= $tag;
        }
    }

    /**
     * Add JS codes to the output.
     */
    public static function js(string $code): void {
        if (stripos(self::$js, $code) === false) {
            self::$js .= $code;
        }
    }

    /**
     * Add CSS codes to the output.
     */
    public static function css(string $code): void {
        if (stripos(self::$css, $code) === false) {
            self::$css .= $code;
        }
    }

    /**
     * Get all head tags.
     */
    public static function getHeadTags(): string {
        if (self::$tests) {
            return '';
        }

        return self::$head['before'].self::$head['after'].self::$head['end'];
    }

    /**
     * Get all footer tags.
     */
    public static function getFooterTags(): string {
        if (self::$tests) {
            return '';
        }

        return self::$footer['before'].self::$footer['after'].self::$footer['end'];
    }
}
