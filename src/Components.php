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

use ReflectionMethod;
use RobiNN\UiKit\Components\Component;

class Components {
    private UiKit $uikit;

    /**
     * @var array<string, string>
     */
    private array $components;

    public function __construct(UiKit $uikit) {
        $this->uikit = $uikit;

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
            'checkbox'     => Components\Form\Checkbox::class,
            'textarea'     => Components\Form\Textarea::class,
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
     * Get an array of all valid components.
     *
     * @return array<string, string>
     *
     * @internal
     */
    public function allComponents(): array {
        static $components = [];

        foreach ($this->components as $key => $class) {
            if (is_subclass_of($class, Component::class)) {
                $components[$key] = $class;

                if ($this->isPublic($class, 'open') && $this->isPublic($class, 'close')) {
                    $components[$key.'_open'] = $class;
                    $components[$key.'_close'] = $class;
                }
            }
        }

        return $components;
    }

    /**
     * Get component's object.
     *
     * @param string $name
     *
     * @return ?string
     */
    public function getComponent(string $name): ?string {
        $all_components = $this->allComponents();

        return $all_components[$name] ?? null;
    }

    /**
     * Register new component.
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
     *
     * @internal
     */
    public function addSuggestions(string $component_name): string {
        $alternatives = [];

        foreach ($this->allComponents() as $name => $component) {
            $lev = levenshtein($component_name, $name);
            if ($lev <= strlen($component_name) / 3 || str_contains($name, $component_name)) {
                $alternatives[$name] = $lev;
            }
        }

        if (count($alternatives) === 0) {
            return '';
        }

        asort($alternatives);

        return sprintf('Did you mean "%s"?', implode('", "', array_keys($alternatives)));
    }

    /**
     * Create dynamic methods.
     *
     * @param string            $name
     * @param array<int, mixed> $arguments
     *
     * @return Component|string
     */
    public function __call(string $name, array $arguments) {
        if (!is_null($this->getComponent($name))) {
            $component = $this->getComponent($name);
            $class = new $component();

            if (property_exists($class, 'uikit')) {
                $class->uikit = $this->uikit;
            }

            if (str_ends_with($name, '_open')) {
                $name = 'open';
            } elseif (str_ends_with($name, '_close')) {
                $name = 'close';
            } else {
                $name = 'render';
            }

            return call_user_func_array(static function (...$parameters) use ($class, $name) {
                return $class->$name(...$parameters);
            }, $arguments);
        }

        return sprintf('Unknown "%s" function. ', $name).$this->addSuggestions($name);
    }

    /**
     * Check if method exists and is public.
     *
     * @param object|string $class
     * @param string        $method
     *
     * @return bool
     */
    private function isPublic($class, string $method): bool {
        return method_exists($class, $method) && (new ReflectionMethod($class, $method))->isPublic();
    }
}
