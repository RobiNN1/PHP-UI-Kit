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

class Misc {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param array  $array
     * @param string $key
     *
     * @return mixed
     */
    public static function arrayGet(array $array, string $key): mixed {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (array_key_exists($segment, $array)) {
                $array = &$array[$segment];
            }
        }

        return $array;
    }

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * @param array  $array
     * @param string $key
     * @param mixed  $value
     *
     * @return array
     */
    public static function arraySet(array &$array, string $key, mixed $value): array {
        $keys = explode('.', $key);

        foreach ($keys as $i => $key) {
            if (count($keys) === 1) {
                break;
            }

            unset($keys[$i]);

            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }

    /**
     * Add space to left or right side.
     *
     * @param mixed $value
     * @param bool  $right
     *
     * @return string
     */
    public static function space(mixed $value, bool $right = false): string {
        $right_side = $right ? $value.' ' : ' '.$value;
        return !empty($value) ? $right_side : '';
    }
}
