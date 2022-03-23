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

class ComponentsList {
    public Components\Layout\Layout $layout;
    public Components\Layout\Container $container;
    public Components\Layout\Row $row;
    public Components\Layout\Grid $grid;

    public Components\Form\Form $form;
    public Components\Form\Input $input;

    public Components\Accordion $accordion;
    public Components\Alert $alert;
    public Components\Badge $badge;
    public Components\Breadcrumbs $breadcrumbs;
    public Components\Button $button;
    public Components\ButtonGroup $button_group;
    public Components\Card $card;
    public Components\Carousel $carousel;
    public Components\Dropdown $dropdown;
    public Components\ListGroup $list_group;
    public Components\Menu $menu;
    public Components\Modal $modal;
    public Components\Pagination $pagination;
    public Components\Progress $progress;
    public Components\Tabs $tabs;

    public function __construct(UiKit $uikit) {
        foreach ($this->getComponents() as $name => $component) {
            $this->$name = new $component['class']($uikit);
        }
    }

    /**
     * Get list of components.
     *
     * @return array
     */
    public function getComponents(): array {
        $components = [];

        $rc = new \ReflectionClass(self::class);

        foreach ($rc->getProperties() as $property) {
            $class = (string)$property->getType();

            $components[$property->getName()] = [
                'class'      => $class,
                'open_close' => method_exists($class, 'open') && method_exists($class, 'close'),
            ];
        }

        return $components;
    }
}
