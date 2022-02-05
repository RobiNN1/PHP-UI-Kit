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

use RobiNN\UiKit\Components\Accordion;
use RobiNN\UiKit\Components\Alert;
use RobiNN\UiKit\Components\Badge;
use RobiNN\UiKit\Components\Breadcrumbs;
use RobiNN\UiKit\Components\Button;
use RobiNN\UiKit\Components\ButtonGroup;
use RobiNN\UiKit\Components\Card;
use RobiNN\UiKit\Components\Carousel;
use RobiNN\UiKit\Components\Dropdown;
use RobiNN\UiKit\Components\ListGroup;
use RobiNN\UiKit\Components\Modal;
use RobiNN\UiKit\Layout\Container;
use RobiNN\UiKit\Layout\Grid;
use RobiNN\UiKit\Layout\Layout;
use RobiNN\UiKit\Layout\Row;

class ComponentsList {
    public Layout $layout;
    public Container $container;
    public Row $row;
    public Grid $grid;

    public Accordion $accordion;
    public Alert $alert;
    public Badge $badge;
    public Breadcrumbs $breadcrumbs;
    public Button $button;
    public ButtonGroup $buttongroup;
    public Card $card;
    public Carousel $carousel;
    public Dropdown $dropdown;
    public ListGroup $listgroup;
    public Modal $modal;

    public function __construct(UiKit $uikit) {
        $this->layout = new Layout($uikit);
        $this->container = new Container($uikit);
        $this->row = new Row($uikit);
        $this->grid = new Grid($uikit);

        $this->accordion = new Accordion($uikit);
        $this->alert = new Alert($uikit);
        $this->badge = new Badge($uikit);
        $this->breadcrumbs = new Breadcrumbs($uikit);
        $this->button = new Button($uikit);
        $this->buttongroup = new ButtonGroup($uikit);
        $this->card = new Card($uikit);
        $this->carousel = new Carousel($uikit);
        $this->dropdown = new Dropdown($uikit);
        $this->listgroup = new ListGroup($uikit);
        $this->modal = new Modal($uikit);
    }
}
