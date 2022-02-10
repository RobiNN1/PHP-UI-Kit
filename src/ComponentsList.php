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
    public Components\Modal $modal;
    public Components\Tabs $tabs;

    public function __construct(UiKit $uikit) {
        foreach (get_class_vars(__CLASS__) as $var => $value) {
            $type = ($var === 'layout' || $var === 'container' || $var === 'row' || $var === 'grid') ? 'Layout\\' : '';
            $class = '\\RobiNN\\UiKit\\Components\\'.$type.strtr($var, ['_' => '']);
            $this->$var = new $class($uikit);
        }
    }
}
