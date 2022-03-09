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

use RobiNN\UiKit\TplEngines\ITplEngine;
use RobiNN\UiKit\TplEngines\Twig;

final class UiKit extends ComponentsList {
    /**
     * @var Config
     */
    private static Config $config;

    /**
     * @var array
     */
    private array $fw_options = [];

    /**
     * @var ITplEngine
     */
    private ITplEngine $tpl_engine;

    /**
     * @var array
     */
    private array $tpl_paths = [];

    public function __construct() {
        parent::__construct($this);
    }

    /**
     * Get instance.
     *
     * @param Config          $config
     * @param bool            $debug
     * @param ITplEngine|null $tpl_engine
     *
     * @return UiKit
     */
    final public static function getInstance(Config $config, bool $debug = true, ITplEngine $tpl_engine = null): UiKit {
        $uikit = new self();
        self::$config = $config;

        $uikit->tpl_engine = $tpl_engine instanceof ITplEngine ? $tpl_engine : new Twig();
        $uikit->tpl_engine->init($uikit, $config, $debug);
        $uikit->tpl_engine->addPaths($uikit->tpl_paths);

        $uikit->loadFrameworkAssets();

        return $uikit;
    }

    /**
     * Get name of currently loaded CSS framework.
     *
     * @return string
     */
    public function getFramework(): string {
        return self::$config->getFramework();
    }

    /**
     * Get CSS framework options using "dot" notation.
     *
     * @param string $key
     *
     * @return array|mixed
     */
    public function getFrameworkOptions(string $key = '') {
        static $config = [];

        $config = (array)require realpath(self::$config->getFrameworkPath(self::$config->getFramework())).'/config.php';

        if (!empty($this->fw_options)) {
            foreach ($this->fw_options as $option => $value) {
                Misc::arraySet($config, $option, $value);
            }
        }

        return Misc::arrayGet($config, $key);
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
        if (self::$config->getFramework() === $framework || empty($framework)) {
            $this->fw_options[$option] = $value;
        }
    }

    /**
     * Load framework assets.
     */
    private function loadFrameworkAssets(): void {
        $fwoptions = (new self())->getFrameworkOptions();

        foreach ($fwoptions['files']['css'] as $css) {
            OutputHandler::addToHead('<link rel="stylesheet" href="'.$css.'">');
        }

        if (!empty($fwoptions['jquery']) && $fwoptions['jquery'] === true) {
            OutputHandler::addToFooter('<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>');
        }

        foreach ($fwoptions['files']['js'] as $js) {
            OutputHandler::addToFooter('<script src="'.$js.'"></script>');
        }
    }

    /**
     * Render template.
     *
     * @param string $tpl
     * @param array  $data
     *
     * @return string
     */
    public function renderTpl(string $tpl, array $data = []): string {
        return $this->tpl_engine->render($tpl, $data);
    }

    /**
     * Get custom TPL functions.
     *
     * @return array
     */
    public function tplFunctions(): array {
        $components_list = [];
        $components = $this->getComponentsList();

        // Components with open and close methods.
        $open_close = [
            'container', 'row', 'grid', 'form',
        ];

        foreach ($components as $component => $class) {
            if (in_array($component, $open_close)) {
                $components_list[$component.'_open'] = [$this->$component, 'open'];
                $components_list[$component.'_close'] = [$this->$component, 'close'];
            } else {
                $components_list[$component] = [$this->$component, 'render'];
            }
        }

        $functions = [
            'add_to_head'   => [OutputHandler::class, 'addToHead'],
            'add_to_footer' => [OutputHandler::class, 'addToFooter'],
            'add_to_js'     => [OutputHandler::class, 'addToJs'],
            'add_to_jquery' => [OutputHandler::class, 'addToJquery'],
            'add_to_css'    => [OutputHandler::class, 'addToCss'],
        ];

        return array_merge($functions, $components_list);
    }

    /**
     * Get custom TPL filters.
     *
     * @return array
     */
    public function tplFilters(): array {
        return [
            'space' => [Misc::class, 'space'],
        ];
    }

    /**
     * Add path with templates.
     *
     * @param string $path
     *
     * @return void
     */
    public function addPath(string $path): void {
        $this->tpl_paths[] = $path;
    }
}
