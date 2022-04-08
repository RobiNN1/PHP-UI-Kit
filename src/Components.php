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

class Components {
    /**
     * @var array
     */
    private array $components;

    /**
     * @param UiKit $uikit
     */
    public function __construct(private UiKit $uikit) {
        $this->components = [
            'layout'       => Components\Layout\Layout::class,
            'container'    => Components\Layout\Container::class,
            'row'          => Components\Layout\Row::class,
            'grid'         => Components\Layout\Grid::class,
            'form'         => Components\Form\Form::class,
            'input'        => Components\Form\Input::class,
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
     * Get array of components or component object.
     *
     * @param ?string $name
     *
     * @return array|object
     */
    public function getComponents(string $name = null): array|object {
        static $components = [];

        foreach ($this->components as $key => $class) {
            $components[$key] = [
                'class'      => $class,
                'open_close' => method_exists($class, 'open') && method_exists($class, 'close'),
            ];
        }

        if (is_string($name) && isset($components[$name])) {
            $component = $components[$name];

            $class = new $component['class']();
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
     * Create dynamic properties.
     *
     * @param string $name
     *
     * @return ?object
     */
    public function __get(string $name): ?object {
        if (!is_array($this->getComponents($name))) {
            return $this->getComponents($name);
        }

        return null;
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

        if (!is_array($this->getComponents($name_clean))) {
            $component = $this->getComponents($name_clean);
            $method = 'render';

            if (str_ends_with($name, '_open') && method_exists($component, 'open')) {
                $method = 'open';
            } else if (str_ends_with($name, '_close') && method_exists($component, 'close')) {
                $method = 'close';
            }

            return call_user_func_array([$component, $method], $arguments);
        }

        return null;
    }
}
