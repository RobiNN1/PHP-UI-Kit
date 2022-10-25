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

use ReflectionMethod;

class Misc {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param array<int|string, mixed> $array
     * @param string                   $key
     *
     * @return mixed
     */
    public static function arrayGet(array $array, string $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return [];
            }

            $array = &$array[$segment];
        }

        return $array;
    }

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * @param array<int|string, mixed> $array
     * @param string                   $array_key
     * @param mixed                    $value
     *
     * @return array<int|string, mixed>
     */
    public static function arraySet(array &$array, string $array_key, $value): array {
        $keys = explode('.', $array_key);

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
     * Add space to the left or the right side.
     *
     * @param ?string $value
     * @param bool    $right
     *
     * @return string
     */
    public static function space(?string $value, bool $right = false): string {
        $right_side = $right ? $value.' ' : ' '.$value;

        return $value !== null && $value !== '' ? $right_side : '';
    }

    /**
     * Check if method exists and is public.
     *
     * @param object|string $class
     * @param string        $method
     *
     * @return bool
     */
    public static function isPublic($class, string $method): bool {
        return method_exists($class, $method) && (new ReflectionMethod($class, $method))->isPublic();
    }

    /**
     * Convert fractions to percents.
     *
     * @param string|int $value
     *
     * @return float|int
     */
    public static function convertFractions($value) {
        if (!is_string($value) && !str_contains((string) $value, '/')) {
            return $value;
        }

        [$top, $bottom] = explode('/', (string) $value);

        return 100 * ((int) $top / (int) $bottom);
    }
}
