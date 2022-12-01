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

class Config {
    private mixed $cache;

    private bool $debug;

    private string $framework;

    /**
     * @var array<string, string>
     */
    private array $framework_paths;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(array $options = []) {
        $options = array_merge([
            'cache'           => false, // An absolute path, a \Twig\Cache\CacheInterface implementation, or false.
            'debug'           => false, // TPL engine debugging.
            'framework'       => 'bootstrap5', // CSS Framework.
            'framework_paths' => [], // Path to CSS Framework, each Framework can be in a different path.
        ], $options);

        $this->cache = $options['cache'];
        $this->debug = (bool) $options['debug'];
        $this->framework = (string) $options['framework'];
        $this->framework_paths = (array) $options['framework_paths'];

        $resources = __DIR__.'/../resources/';
        $frameworks = array_diff((array) scandir($resources), ['.', '..']);

        foreach ($frameworks as $framework) {
            if (is_file($resources.'/'.$framework.'/config.php')) {
                $this->framework_paths[(string) $framework] = $resources.'/'.$framework;
            }
        }
    }

    /**
     * Get cache.
     */
    public function getCache(): mixed {
        return $this->cache;
    }

    /**
     * Set cache.
     *
     * @param mixed $cache An absolute path, a \Twig\Cache\CacheInterface implementation, or false.
     */
    public function setCache(mixed $cache): void {
        $this->cache = $cache;
    }

    /**
     * Get debug option.
     */
    public function getDebug(): bool {
        return $this->debug;
    }

    /**
     * Enable TPL debugging.
     */
    public function enableDebug(): void {
        $this->debug = true;
    }

    /**
     * Get the currently loaded framework.
     */
    public function getFramework(): string {
        return $this->framework;
    }

    /**
     * Set the framework.
     *
     * @param string $framework Framework name.
     */
    public function setFramework(string $framework): void {
        $this->framework = $framework;
    }

    /**
     * Get all frameworks with their path.
     *
     * @return array<string, string>
     */
    public function getAllFrameworks(): array {
        return $this->framework_paths;
    }

    /**
     * Get a path of the currently loaded framework.
     *
     * @param string $framework Framework name.
     */
    public function getFrameworkPath(string $framework): string {
        return $this->framework_paths[$framework];
    }

    /**
     * Set path to the framework.
     *
     * @param string $framework Framework name.
     * @param string $path      Absolute path to the famework.
     */
    public function setFrameworkPath(string $framework, string $path): void {
        $this->framework_paths[$framework] = $path;
    }
}
