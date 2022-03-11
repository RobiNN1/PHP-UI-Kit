<?php
require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Get UI Kit object.
 *
 * Note: No need to create this function, it only overrides defaults when using helpers.
 *
 * @return RobiNN\UiKit\UiKit
 */
function get_ui(): RobiNN\UiKit\UiKit {
    return RobiNN\UiKit\UiKit::getInstance([
        'cache'     => __DIR__.'/../cache',
        'debug'     => true,
        'framework' => isset($_GET['sm']) ? 'semanticui2' : 'bootstrap5', // for development purposes
    ]);
}

get_ui()->setPath(__DIR__.'/templates/');

echo get_ui()->renderTpl('page', [
    'framework' => get_ui()->getFramework(),
]);
