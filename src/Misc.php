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
     */
    public static function arrayGet(array $array, string $key): mixed {
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
     *
     * @return array<int|string, mixed>
     */
    public static function arraySet(array &$array, string $array_key, mixed $value): array {
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
     */
    public static function space(?string $value, bool $right = false): string {
        $right_side = $right ? $value.' ' : ' '.$value;

        return $value !== null && $value !== '' ? $right_side : '';
    }

    /**
     * Check if method exists and is public.
     */
    public static function isPublic(object|string $class, string $method): bool {
        return method_exists($class, $method) && (new ReflectionMethod($class, $method))->isPublic();
    }

    /**
     * Convert fractions to percents.
     */
    public static function convertFractions(int|string $value): float|int {
        if (!is_string($value) && !str_contains((string) $value, '/')) {
            return $value;
        }

        [$top, $bottom] = explode('/', (string) $value);

        return 100 * (int) $top / (int) $bottom;
    }
}
