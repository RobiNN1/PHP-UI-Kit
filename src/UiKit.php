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
    public const VERSION = '1.0.1';

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

    private static ?UiKit $instance = null;

    /**
     * @param array<string, mixed>|Config $config
     */
    public function __construct($config = []) {
        parent::__construct($this);

        $this->config = is_array($config) ? new Config($config) : $config;
        $this->twig = new Twig();
    }

    /**
     * Get instance.
     *
     * @param array<string, mixed>|Config $config
     *
     * @return UiKit
     */
    public static function getInstance($config = []): UiKit {
        if (self::$instance === null) {
            self::$instance = new self();
            self::$instance->config = is_array($config) ? new Config($config) : $config;
        }

        return self::$instance;
    }

    /**
     * Get CSS framework option using "dot" notation.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getFrameworkOption(string $key) {
        $config = (array) require realpath($this->config->getFrameworkPath($this->config->getFramework())).'/config.php';

        if (count($this->fw_options)) {
            foreach ($this->fw_options as $option => $value) {
                Misc::arraySet($config, $option, $value);
            }
        }

        return Misc::arrayGet($config, $key);
    }

    /**
     * Set something only for a scpefied framework(s).
     *
     * @param string|array<int, string>|null $framework
     *
     * @return bool
     */
    public function checkFramework($framework = null): bool {
        if ($framework === null) {
            return true;
        }

        if (is_array($framework)) {
            $fw = in_array($this->config->getFramework(), $framework, true);
        } else {
            $fw = $this->config->getFramework() === $framework;
        }

        return $fw;
    }

    /**
     * Set CSS framework options using "dot" notation.
     *
     * @param string                         $option
     * @param mixed                          $value
     * @param string|array<int, string>|null $framework
     *
     * @return UiKit
     */
    public function setFrameworkOption(string $option, $value, $framework = null): UiKit {
        if ($this->checkFramework($framework)) {
            $this->fw_options[$option] = $value;
        }

        return $this;
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
