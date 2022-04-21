<?php
namespace PHPSTORM_META {
    // Fix for magic properties
    override(\RobiNN\UiKit\Components::__get(0), map([
        // Layout
        'layout'       => \RobiNN\UiKit\Components\Layout\Layout::class,
        'container'    => \RobiNN\UiKit\Components\Layout\Container::class,
        'row'          => \RobiNN\UiKit\Components\Layout\Row::class,
        'grid'         => \RobiNN\UiKit\Components\Layout\Grid::class,
        // Form
        'form'         => \RobiNN\UiKit\Components\Form\Form::class,
        'input'        => \RobiNN\UiKit\Components\Form\Input::class,
        'select'       => \RobiNN\UiKit\Components\Form\Select::class,
        'checkbox'     => Components\Form\Checkbox::class,
        // Components
        'accordion'    => \RobiNN\UiKit\Components\Accordion::class,
        'alert'        => \RobiNN\UiKit\Components\Alert::class,
        'badge'        => \RobiNN\UiKit\Components\Badge::class,
        'breadcrumbs'  => \RobiNN\UiKit\Components\Breadcrumbs::class,
        'button'       => \RobiNN\UiKit\Components\Button::class,
        'button_group' => \RobiNN\UiKit\Components\ButtonGroup::class,
        'card'         => \RobiNN\UiKit\Components\Card::class,
        'carousel'     => \RobiNN\UiKit\Components\Carousel::class,
        'dropdown'     => \RobiNN\UiKit\Components\Dropdown::class,
        'list_group'   => \RobiNN\UiKit\Components\ListGroup::class,
        'menu'         => \RobiNN\UiKit\Components\Menu::class,
        'modal'        => \RobiNN\UiKit\Components\Modal::class,
        'pagination'   => \RobiNN\UiKit\Components\Pagination::class,
        'progress'     => \RobiNN\UiKit\Components\Progress::class,
        'tabs'         => \RobiNN\UiKit\Components\Tabs::class,
    ]));

    // Autocomplete values
    expectedArguments(\RobiNN\UiKit\Components\Form\Form::open(0), 0, 'get', 'post');
    expectedArguments(\RobiNN\UiKit\Components\Alert::render(0, 1), 1, 'default', 'success', 'warning', 'error', 'info');
    expectedArguments(\RobiNN\UiKit\Components\Badge::render(0, 1), 1, 'default', 'primary', 'success', 'warning', 'error', 'info');
    expectedArguments(\RobiNN\UiKit\Components\Button::render(0, 1), 1, 'button', 'submit', 'reset');

    expectedArguments(form_open(0), 0, 'get', 'post');
    expectedArguments(alert(0, 1), 1, 'default', 'success', 'warning', 'error', 'info');
    expectedArguments(badge(0, 1), 1, 'default', 'primary', 'success', 'warning', 'error', 'info');
    expectedArguments(button(0, 1), 1, 'button', 'submit', 'reset');
}
