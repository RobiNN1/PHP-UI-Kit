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

class Config {
    public const VERSION = '1.0.0';

    /**
     * @var string
     */
    private string $assets_path;

    /**
     * @var mixed
     */
    private $cache;

    /**
     * @var string
     */
    private string $framework;

    /**
     * @var array
     */
    private array $framework_path;

    /**
     * @param array $options
     */
    public function __construct(array $options = []) {
        $options = array_merge([
            'assets_path'    => __DIR__.'/../assets/', // Absolute path to assets.
            'cache'          => false, // Cache object (depends on tpl engine), absolute path or false.
            'framework'      => 'bootstrap5', // CSS Framework. Possible value: bootstrap5|semanticui2
            'framework_path' => [], // Path to CSS Framework, each Framework can be in different path.
        ], $options);

        $this->assets_path = $options['assets_path'];

        if (!is_dir($options['cache'])) {
            @mkdir($options['cache'], 0777, true);
        }

        $this->cache = $options['cache'];
        $this->framework = $options['framework'];
        $this->framework_path = $options['framework_path'];
    }

    /**
     * @return string
     */
    public function getAssetsPath(): string {
        return $this->assets_path;
    }

    /**
     * @param string $assets_path
     */
    public function setAssetsPath(string $assets_path): void {
        $this->assets_path = $assets_path;
    }

    /**
     * @return mixed
     */
    public function getCache() {
        return $this->cache;
    }

    /**
     * @param mixed $cache
     */
    public function setCache($cache): void {
        $this->cache = $cache;
    }

    /**
     * @return string
     */
    public function getFramework(): string {
        return $this->framework;
    }

    /**
     * @param string $framework
     */
    public function setFramework(string $framework): void {
        $this->framework = $framework;
    }

    /**
     * @return string
     */
    public function getFrameworkPath(): string {
        if (isset($this->framework_path[$this->framework]) && is_dir($this->framework_path[$this->framework])) {
            return $this->framework_path[$this->framework];
        }
        return $this->assets_path.$this->framework.'/';
    }

    /**
     * @param string $framework
     * @param string $path
     *
     * @return void
     */
    public function setFrameworkPath(string $framework, string $path): void {
        $this->framework_path[$framework] = $path;
    }
}
