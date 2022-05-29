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

use RobiNN\UiKit\TplEngines\TplEngineInterface;
use RobiNN\UiKit\TplEngines\Twig\Twig;

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
     * @var TplEngineInterface
     */
    private TplEngineInterface $tpl_engine;

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
     * @return UiKit
     */
    public static function getInstance(): UiKit {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Init UI Kit.
     *
     * @param ?Config             $config
     * @param ?TplEngineInterface $tpl_engine
     *
     * @return UiKit
     */
    public function init(?Config $config = null, ?TplEngineInterface $tpl_engine = null): UiKit {
        $this->config = $config instanceof Config ? $config : new Config();
        $this->tpl_engine = $tpl_engine instanceof TplEngineInterface ? $tpl_engine : new Twig();
        $this->loadFrameworkAssets();

        return $this;
    }

    /**
     * Get CSS framework options using "dot" notation.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getFrameworkOptions(string $key = ''): mixed {
        static $config_array = [];

        $config_array = (array) require realpath($this->config->getFrameworkPath($this->config->getFramework())).'/config.php';

        if (!empty($this->fw_options)) {
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
    public function setFrameworkOption(string $option, mixed $value, string $framework = ''): void {
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
     * @param bool   $string
     *
     * @return string
     */
    public function render(string $tpl, array $data = [], bool $string = false): string {
        $this->tpl_engine->init($this, $this->config, $this->tpl_paths);
        $output = $this->tpl_engine->render($tpl, $data, $string);

        return trim($output);
    }

    /**
     * Get custom TPL functions.
     *
     * @return array
     *
     * @internal
     */
    public function tplFunctions(): array {
        $components = [];

        foreach ($this->getComponents() as $name => $component) {
            if ((bool) $component['open_close'] === true) {
                $components[$name.'_open'] = [$this->$name, 'open'];
                $components[$name.'_close'] = [$this->$name, 'close'];
            }

            $components[$name] = [$this->$name, 'render'];
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
     *
     * @internal
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
