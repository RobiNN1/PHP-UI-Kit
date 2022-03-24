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

final class UiKit extends Components {
    /**
     * @const string UI Kit version.
     */
    public const VERSION = '1.0.0';

    /**
     * @var ?UiKit
     */
    private static ?UiKit $instance = null;

    /**
     * @var Config
     */
    public Config $config;

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

    /**
     * @var string
     */
    private string $html = '';

    public function __construct() {
        parent::__construct($this);
    }

    /**
     * Get instance and init UI Kit.
     *
     * @param ?Config     $config
     * @param ?ITplEngine $tpl_engine
     *
     * @return UiKit
     */
    public static function getInstance(?Config $config = null, ?ITplEngine $tpl_engine = null): UiKit {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::$instance->config = $config instanceof Config ? $config : new Config();

        self::$instance->tpl_engine = $tpl_engine instanceof ITplEngine ? $tpl_engine : new Twig();
        self::$instance->tpl_engine->init(self::$instance, self::$instance->config);
        self::$instance->tpl_engine->addPaths(self::$instance->tpl_paths);

        self::$instance->loadFrameworkAssets();

        return self::$instance;
    }

    /**
     * Get CSS framework options using "dot" notation.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getFrameworkOptions(string $key = ''): mixed {
        static $config = [];

        $config = (array)require realpath($this->config->getFrameworkPath($this->config->getFramework())).'/config.php';

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
    public function setFrameworkOption(string $option, mixed $value, string $framework = ''): void {
        if ($this->config->getFramework() === $framework || empty($framework)) {
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

        if (!empty($fwoptions['jquery']) && $fwoptions['jquery'] === true) {
            AddTo::footer('<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>');
        }

        foreach ($fwoptions['files']['js'] as $js) {
            AddTo::footer('<script src="'.$js.'"></script>');
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
        $output = $this->tpl_engine->render($tpl, $data);
        $output = trim($output);
        $this->html .= $output;

        return $output;
    }

    /**
     * Add HTML code.
     *
     * @param string $html
     *
     * @return void
     */
    public function addHtml(string $html): void {
        $this->html .= $html;
    }

    /**
     * Get HTML code.
     *
     * @return string
     */
    public function getHtml(): string {
        return $this->html;
    }

    /**
     * Get custom TPL functions.
     *
     * @return array
     */
    public function tplFunctions(): array {
        $components = [];

        foreach ($this->getComponents() as $name => $component) {
            if ((bool)$component['open_close'] === true) {
                $components[$name.'_open'] = [$this->$name, 'open'];
                $components[$name.'_close'] = [$this->$name, 'close'];
            } else {
                $components[$name] = [$this->$name, 'render'];
            }
        }

        $functions = [
            'add_to_head'   => [AddTo::class, 'head'],
            'add_to_footer' => [AddTo::class, 'footer'],
            'add_to_js'     => [AddTo::class, 'js'],
            'add_to_jquery' => [AddTo::class, 'jQuery'],
            'add_to_css'    => [AddTo::class, 'css'],
        ];

        return array_merge($functions, $components);
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
     * Set path with templates.
     *
     * @param string $path
     *
     * @return void
     */
    public function setPath(string $path): void {
        $this->tpl_paths[] = $path;
    }
}
