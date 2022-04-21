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

use RobiNN\UiKit\Components\Component;

class Components {
    /**
     * @var array
     */
    private array $components;

    /**
     * @param UiKit $uikit
     */
    public function __construct(private readonly UiKit $uikit) {
        $this->components = [
            // Layout
            'layout'       => Components\Layout\Layout::class,
            'container'    => Components\Layout\Container::class,
            'row'          => Components\Layout\Row::class,
            'grid'         => Components\Layout\Grid::class,
            // Form
            'form'         => Components\Form\Form::class,
            'input'        => Components\Form\Input::class,
            'select'       => Components\Form\Select::class,
            // Components
            'accordion'    => Components\Accordion::class,
            'alert'        => Components\Alert::class,
            'badge'        => Components\Badge::class,
            'breadcrumbs'  => Components\Breadcrumbs::class,
            'button'       => Components\Button::class,
            'button_group' => Components\ButtonGroup::class,
            'card'         => Components\Card::class,
            'carousel'     => Components\Carousel::class,
            'dropdown'     => Components\Dropdown::class,
            'list_group'   => Components\ListGroup::class,
            'menu'         => Components\Menu::class,
            'modal'        => Components\Modal::class,
            'pagination'   => Components\Pagination::class,
            'progress'     => Components\Progress::class,
            'tabs'         => Components\Tabs::class,
        ];
    }

    /**
     * Get an array of components or component object.
     *
     * @param ?string $name
     *
     * @return array|object
     * @internal
     */
    public function getComponents(string $name = null): array|object {
        static $components = [];

        foreach ($this->components as $key => $class) {
            if ((new $class()) instanceof Component) {
                $components[$key] = [
                    'class'      => $class,
                    'open_close' => method_exists($class, 'open') && method_exists($class, 'close'),
                ];
            }
        }

        if (is_string($name) && isset($components[$name])) {
            $class = new $components[$name]['class']();
            $class->uikit = $this->uikit;

            return $class;
        }

        return $components;
    }

    /**
     * Add component.
     *
     * @param string $name
     * @param string $class
     *
     * @return void
     */
    public function addComponent(string $name, string $class): void {
        $this->components[$name] = $class;
    }

    /**
     * Add a suggestions if the component name is misspelled or does not exist.
     *
     * @param string $component_name
     *
     * @return string
     * @internal
     */
    public function addSuggestions(string $component_name): string {
        $alternatives = [];

        foreach ($this->getComponents() as $name => $component) {
            $lev = levenshtein($component_name, $name);
            if ($lev <= strlen($component_name) / 3 || str_contains($name, $component_name)) {
                $alternatives[$name] = $lev;
            }
        }

        if (!$alternatives) {
            return '';
        }

        asort($alternatives);

        return sprintf('Did you mean "%s"?', implode('", "', array_keys($alternatives)));
    }

    /**
     * Check component.
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name) {
        return isset($this->components[$name]);
    }

    /**
     * Create dynamic properties.
     *
     * @param string $name
     *
     * @return ?object
     */
    public function __get(string $name): ?object {
        if (is_object($this->getComponents($name))) {
            return $this->getComponents($name);
        }

        return null;
    }

    /**
     * Set component.
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function __set(string $name, string $value) {
        $this->components[$name] = $value;
    }

    /**
     * Create dynamic methods.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed {
        $name_clean = str_replace(['_open', '_close'], '', $name);

        if (is_object($this->getComponents($name_clean))) {
            $component = $this->getComponents($name_clean);
            $method = 'render';

            if (str_ends_with($name, '_open') && method_exists($component, 'open')) {
                $method = 'open';
            } else if (str_ends_with($name, '_close') && method_exists($component, 'close')) {
                $method = 'close';
            }

            return call_user_func_array([$component, $method], $arguments);
        }

        return sprintf('Unknown "%s" function. ', $name).$this->addSuggestions($name);
    }
}
