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
     * @var array<string, string>
     */
    private array $components = [
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

    public function __construct(private readonly UiKit $uikit) {
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

        foreach ($this->components as $name => $class) {
            if (is_subclass_of($class, Component::class)) {
                $components[$name] = $class;

                if (Misc::isPublic($class, 'open') && Misc::isPublic($class, 'close')) {
                    $components[$name.'_open'] = $class;
                    $components[$name.'_close'] = $class;
                }
            }
        }

        return $components;
    }

    /**
     * Get component's object.
     */
    public function getComponent(string $name): ?string {
        $all_components = $this->allComponents();

        return $all_components[$name] ?? null;
    }

    /**
     * Register new component.
     */
    public function addComponent(string $name, string $class): void {
        $this->components[$name] = $class;
    }

    /**
     * Add a suggestions if the component name is misspelled or does not exist.
     *
     * @internal
     */
    public function addSuggestions(string $component_name): string {
        $alternatives = [];

        foreach ($this->allComponents() as $name => $class) {
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
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments): Component|string {
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

            return $class->$name(...$arguments);
        }

        return sprintf('Unknown "%s" function. ', $name).$this->addSuggestions($name);
    }
}
