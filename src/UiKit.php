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

use RobiNN\UiKit\Twig\Twig;

class UiKit extends Components {
    /**
     * @const string UI Kit version.
     */
    public const VERSION = '1.0.0';

    public Config $config;

    /**
     * @var array<string, mixed>
     */
    private array $fw_options = [];

    /**
     * @var array<string, string>
     */
    private array $tpl_paths = [];

    private Twig $twig;

    /**
     * @param array<string, mixed>|Config $config
     */
    public function __construct($config = []) {
        parent::__construct($this);

        $this->config = is_array($config) ? new Config($config) : $config;
        $this->twig = new Twig();

        $this->loadFrameworkAssets();
    }

    /**
     * Get CSS framework options using "dot" notation.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getFrameworkOptions(string $key = '') {
        static $config_array = [];

        $config_array = (array) require realpath($this->config->getFrameworkPath($this->config->getFramework())).'/config.php';

        if (count($this->fw_options)) {
            foreach ($this->fw_options as $option => $value) {
                Misc::arraySet($config_array, $option, $value);
            }
        }

        return Misc::arrayGet($config_array, $key);
    }

    /**
     * Set CSS framework options using "dot" notation.
     *
     * @param string $option
     * @param mixed  $value
     * @param string $framework
     *
     * @return void
     */
    public function setFrameworkOption(string $option, $value, string $framework = ''): void {
        if (empty($framework) || $this->config->getFramework() === $framework) {
            $this->fw_options[$option] = $value;
        }
    }

    /**
     * Load framework assets.
     */
    private function loadFrameworkAssets(): void {
        $fwoptions = $this->getFrameworkOptions();

        foreach ($fwoptions['files']['css'] as $css) {
            AddTo::head('<link rel="stylesheet" href="'.$css.'">');
        }

        foreach ($fwoptions['files']['js'] as $js) {
            AddTo::footer('<script src="'.$js.'"></script>');
        }
    }

    /**
     * Render template.
     *
     * @param string               $tpl
     * @param array<string, mixed> $data
     * @param bool                 $string
     *
     * @return string
     */
    public function render(string $tpl, array $data = [], bool $string = false): string {
        $this->twig->init($this, $this->config, $this->tpl_paths);
        $output = $this->twig->render($tpl, $data, $string);

        return trim($output);
    }

    /**
     * Add a tpl path with namespace.
     *
     * https://twig.symfony.com/doc/3.x/api.html#built-in-loaders
     *
     * @param string $path
     * @param string $namespace
     *
     * @return UiKit
     */
    public function addPath(string $path, string $namespace = '__main__'): UiKit {
        $this->tpl_paths[$namespace] = $path;

        return $this;
    }
}
