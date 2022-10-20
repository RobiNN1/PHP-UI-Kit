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

/**
 * Layout
 * @method Components\Layout\Layout    layout(string $body, array $options = [])
 * @method Components\Layout\Container container(bool $fluid = false, array $options = [])
 * @method Components\Layout\Container container_open(bool $fluid = false, array $options = [])
 * @method string                      container_close()
 * @method Components\Layout\Row       row(array $options = [])
 * @method Components\Layout\Row       row_open(array $options = [])
 * @method string                      row_close()
 * @method Components\Layout\Grid      grid(array $col_sizes = [], array $options = [])
 * @method Components\Layout\Grid      grid_open(array $col_sizes = [100], array $options = [])
 * @method string                      grid_close()
 * Form
 * @method Components\Form\Form     form(string $method = 'post', string $action = '', array $options = [])
 * @method Components\Form\Form     form_open(string $method = 'post', string $action = '', array $options = [])
 * @method string                   form_close()
 * @method Components\Form\Input    input(string $name, string $label = '', $value = '', array $options = [])
 * @method Components\Form\Select   select(string $name, string $label = '', $value = '', array $items = [], array $options = [])
 * @method Components\Form\Checkbox checkbox(string $name, string $label = '', $value = 0, array $options = [])
 * @method Components\Form\Textarea textarea(string $name, string $label = '', $value = '', array $options = [])
 * Components
 * @method Components\Accordion   accordion(string $id, array $items, array $options = [])
 * @method Components\Alert       alert(string $text, string $color = 'default', array $options = [])
 * @method Components\Badge       badge(string $text, string $color = 'default', array $options = [])
 * @method Components\Breadcrumbs breadcrumbs(array $links, array $options = [])
 * @method Components\Button      button(string $title, string $type = 'button', array $options = [])
 * @method Components\ButtonGroup button_group(array $items, array $options = [])
 * @method Components\Card        card(array $options = [])
 * @method Components\Carousel    carousel(string $id, array $slides, array $options = [])
 * @method Components\Dropdown    dropdown(string $title, array $items, array $options = [])
 * @method Components\ListGroup   list_group(array $items, array $options = [])
 * @method Components\Menu        menu(string $id, array $items, array $options = [])
 * @method Components\Modal       modal(string $id, array $content, array $options = [])
 * @method Components\Pagination  pagination(array $items, array $options = [])
 * @method Components\Progress    progress($percent, array $options = [])
 * @method Components\Tabs        tabs(string $id, array $items, array $options = [])
 */
class UiKit extends Components {
    /**
     * @const string UI Kit version.
     */
    public const VERSION = '1.1.0';

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
