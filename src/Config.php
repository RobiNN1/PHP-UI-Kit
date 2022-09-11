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
    /**
     * @var mixed
     */
    private $cache;

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
            'framework_paths' => [
                // Path to CSS Framework, each Framework can be in a different path.
                'bootstrap5'  => __DIR__.'/../resources/bootstrap5',
                'fomanticui2' => __DIR__.'/../resources/fomanticui2',
            ],
        ], $options);

        $this->cache = $options['cache'];
        $this->debug = $options['debug'];
        $this->framework = $options['framework'];
        $this->framework_paths = $options['framework_paths'];
    }

    /**
     * Get cache.
     *
     * @return mixed
     */
    public function getCache() {
        return $this->cache;
    }

    /**
     * Set cache.
     *
     * @param mixed $cache An absolute path, a \Twig\Cache\CacheInterface implementation, or false.
     */
    public function setCache($cache): void {
        $this->cache = $cache;
    }

    /**
     * Get debug option.
     *
     * @return bool
     */
    public function getDebug(): bool {
        return $this->debug;
    }

    /**
     * Enable TPL debugging.
     *
     * @return void
     */
    public function enableDebug(): void {
        $this->debug = true;
    }

    /**
     * Get the currently loaded framework.
     *
     * @return string
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
     * Get a path of the currently loaded framework.
     *
     * @param string $framework Framework name.
     *
     * @return string
     */
    public function getFrameworkPath(string $framework): string {
        return $this->framework_paths[$framework];
    }

    /**
     * Set path to the framework.
     *
     * @param string $framework Framework name.
     * @param string $path      Absolute path to the famework.
     *
     * @return void
     */
    public function setFrameworkPath(string $framework, string $path): void {
        $this->framework_paths[$framework] = $path;
    }
}
