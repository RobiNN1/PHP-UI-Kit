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

class UiKit extends Components {
    /**
     * @const string UI Kit version.
     */
    public const VERSION = '1.0.0';

    /**
     * @var array<string, mixed>
     */
    private array $fw_options = [];

    /**
     * @var array<int, string>
     */
    private array $tpl_paths = [];

    public function __construct(
        public ?Config              $config = null,
        private ?TplEngineInterface $tpl_engine = null
    ) {
        parent::__construct($this);

        $this->config = $config instanceof Config ? $config : new Config();
        $this->tpl_engine = $tpl_engine instanceof TplEngineInterface ? $tpl_engine : new Twig();
        $this->loadFrameworkAssets();
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

        if (isset($fwoptions['jquery']) && $fwoptions['jquery'] === true) {
            AddTo::footer('<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>');
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
        $this->tpl_engine->init($this, $this->config, $this->tpl_paths);
        $output = $this->tpl_engine->render($tpl, $data, $string);

        return trim($output);
    }

    /**
     * Set path with templates.
     *
     * @param string $path
     *
     * @return static
     */
    public function setPath(string $path): static {
        $this->tpl_paths[] = $path;

        return $this;
    }
}
