<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UiKit;

class Config {
    public const VERSION = '1.0.0';

    /**
     * @var bool
     */
    private bool $cdn;

    /**
     * @var string
     */
    private string $site_path;

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
     * @param array $options
     */
    public function __construct(array $options = []) {
        $options = array_merge([
            'cdn'         => true, // CDN for css frameworks and libs.
            'site_path'   => '/assets/', // Relative path to assets.
            'assets_path' => __DIR__.'/../assets/', // Absolute path to assets.
            'cache'       => false, // Cache object (depends on tpl engine), absolute path or false.
            'framework'   => 'bootstrap5' // CSS Framework. Possible value: bootstrap5|semanticui2
        ], $options);

        $this->cdn = (bool)$options['cdn'];
        $this->site_path = $options['site_path'];
        $this->assets_path = $options['assets_path'];
        $this->cache = $options['cache'];
        $this->framework = $options['framework'];
    }

    /**
     * @return bool
     */
    public function isCdn(): bool {
        return $this->cdn;
    }

    /**
     * @return void
     */
    public function enableCdn(): void {
        $this->cdn = true;
    }

    /**
     * @return void
     */
    public function disableCdn(): void {
        $this->cdn = false;
    }

    /**
     * @return string
     */
    public function getSitePath(): string {
        return $this->site_path;
    }

    /**
     * @param string $site_path
     */
    public function setSitePath(string $site_path): void {
        $this->site_path = $site_path;
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
     * @param bool $relative
     *
     * @return string
     */
    public function getFrameworkPath(bool $relative = true): string {
        $path = $relative ? $this->site_path : $this->assets_path;
        return $path.$this->framework.'/';
    }
}
