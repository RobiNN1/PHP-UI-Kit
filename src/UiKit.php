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

use UiKit\TplEngine\Twig;

final class UiKit {
    /**
     * @var Config
     */
    private static Config $config;

    /**
     * @var array
     */
    private static array $fw_options = [];

    /**
     * @var ITplEngine
     */
    private static ITplEngine $tpl_engine;

    /**
     * Get instance.
     *
     * @param Config          $config
     * @param bool            $debug
     * @param ITplEngine|null $tpl_engine
     *
     * @return UiKit
     */
    public static function getInstance(Config $config, bool $debug = true, ITplEngine $tpl_engine = null): UiKit {
        $uikit = new self();
        self::$config = $config;

        self::$tpl_engine = $tpl_engine instanceof ITplEngine ? $tpl_engine : new Twig();
        self::$tpl_engine->init($uikit, $config, $debug);

        self::loadFrameworkFiles();

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
     * Get CSS framework options.
     *
     * @param string $key
     *
     * @return array|mixed
     */
    public static function getFrameworkOptions(string $key = '') {
        global $init;

        require_once self::$config->getFrameworkPath(false).'init.php';

        if (!empty(self::$fw_options)) {
            $custom = [];
            foreach (self::$fw_options as $option => $value) {
                $custom = Misc::arraySet($init, $option, $value);
            }

            $init = array_merge($init, $custom);
        }

        return $init[$key] ?? $init;
    }

    /**
     * Set CSS framework options using dot notation.
     * E.g. setFrameworkOption('badge.colors.default', 'bg-primary blue') will set blue color to all frameworks.
     *
     * @param string $option
     * @param mixed  $value
     * @param string $framework
     *
     * @return void
     */
    public function setFrameworkOption(string $option, $value, string $framework = ''): void {
        if (self::$config->getFramework() === $framework || empty($framework)) {
            self::$fw_options[$option] = $value;
        }
    }

    /**
     * Get attributes.
     *
     * @param array $attributes
     *
     * @return string
     */
    public function getAttributes(array $attributes): string {
        $attributes_ = [];
        foreach ($attributes as $attr => $value) {
            $attributes_[] = $attr.(!empty($value) ? '="'.$value.'"' : '');
        }

        return implode(' ', $attributes_);
    }

    /**
     * Get correct value from options.
     *
     * @param string $option
     * @param mixed  $value
     * @param array  $opts
     *
     * @return mixed
     */
    public function getOption(string $option, $value, array $opts) {
        return in_array($value, array_keys($opts[$option])) ? $opts[$option][$value] : $opts[$option]['default'];
    }

    /**
     * Load framework files.
     */
    public static function loadFrameworkFiles(): void {
        $path = !self::$config->isCdn() ? self::$config->getFrameworkPath() : '';

        $fwoptions = self::getFrameworkOptions();
        $files = $fwoptions['files'][self::$config->isCdn() ? 'cdn' : 'local'];

        foreach ($files['css'] as $css) {
            OutputHandler::addToHead('<link rel="stylesheet" href="'.$path.$css.'">');
        }

        if (!empty($fwoptions['jquery']) && $fwoptions['jquery'] === true) {
            if (self::$config->isCdn()) {
                $jquery = 'https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js';
            } else {
                $jquery = self::$config->getSitePath().'shared_resources/jquery.min.js';
            }

            OutputHandler::addToFooter('<script src="'.$jquery.'"></script>');
        }

        foreach ($files['js'] as $js) {
            OutputHandler::addToFooter('<script src="'.$path.$js.'"></script>');
        }
    }

    /**
     * Render template.
     *
     * @param string $tpl
     * @param array  $context
     *
     * @return string
     */
    public function render(string $tpl, array $context = []): string {
        return self::$tpl_engine->render($tpl, $context);
    }

    /**
     * Get TPL Instancee.
     *
     * @return object
     */
    public function getTplInstancee(): object {
        return self::$tpl_engine->getTplInstancee();
    }

    /**
     * Get custom TPL functions.
     *
     * @return array
     */
    public function tplFunctions(): array {
        return [
            'add_to_head'   => [OutputHandler::class, 'addToHead'],
            'add_to_footer' => [OutputHandler::class, 'addToFooter'],
            'add_to_js'     => [OutputHandler::class, 'addToJs'],
            'add_to_jquery' => [OutputHandler::class, 'addToJquery'],
            'fw_path'       => fn() => self::$config->getFrameworkPath()
        ];
    }

    /**
     * Get custom TPL filters.
     *
     * @return array
     */
    public function tplFilters(): array {
        return [
            'space' => fn($value, $right = false) => (!empty($value) ? ($right === true ? $value.' ' : ' '.$value) : '')
        ];
    }

    /**
     * @param string $tag
     *
     * @return void
     */
    public function addToHead(string $tag): void {
        OutputHandler::addToHead($tag);
    }

    /**
     * @param string $tag
     *
     * @return void
     */
    public function addToFooter(string $tag): void {
        OutputHandler::addToFooter($tag);
    }

    /**
     * Check component.
     *
     * @param string $key
     *
     * @return bool
     */
    public function checkComponent(string $key): bool {
        return in_array($key, $this->getFrameworkOptions('components'));
    }

    /**
     * Message when component is not supported.
     *
     * @param string $key
     * @param string $requires
     *
     * @return string
     */
    public function noComponentMsg(string $key, string $requires = ''): string {
        if (!empty($requires) && !$this->checkComponent($requires)) {
            return sprintf('Component <b>%s</b> requires support for <b>%s</b> component in <b>%s</b> framework.',
                $key, $requires, self::$config->getFramework());
        }

        return sprintf('Component <b>%s</b> is not supported in <b>%s</b> framework.', $key, self::$config->getFramework());
    }
}
