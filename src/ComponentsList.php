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
    public \RobiNN\UiKit\Layout\Layout $layout;
    public \RobiNN\UiKit\Layout\Container $container;
    public \RobiNN\UiKit\Layout\Row $row;
    public \RobiNN\UiKit\Layout\Grid $grid;

    public \RobiNN\UiKit\Components\Accordion $accordion;
    public \RobiNN\UiKit\Components\Alert $alert;
    public \RobiNN\UiKit\Components\Badge $badge;
    public \RobiNN\UiKit\Components\Breadcrumbs $breadcrumbs;
    public \RobiNN\UiKit\Components\Button $button;
    public \RobiNN\UiKit\Components\ButtonGroup $buttongroup;
    public \RobiNN\UiKit\Components\Card $card;
    public \RobiNN\UiKit\Components\Carousel $carousel;
    public \RobiNN\UiKit\Components\Dropdown $dropdown;
    public \RobiNN\UiKit\Components\ListGroup $listgroup;
    public \RobiNN\UiKit\Components\Modal $modal;

    public function __construct(UiKit $uikit) {
        foreach (get_class_vars(__CLASS__) as $var => $value) {
            $type = ($var === 'layout' || $var === 'container' || $var === 'row' || $var === 'grid') ? 'Layout' : 'Components';
            $class = '\\RobiNN\\UiKit\\'.$type.'\\'.$var;
            $this->$var = new $class($uikit);
        }
    }
}
