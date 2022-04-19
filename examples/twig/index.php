<?php
declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Get a UI Kit object.
 *
 * Note: No need to create this function, it only overrides defaults when using helpers.
 *
 * @return RobiNN\UiKit\UiKit
 */
function get_ui(): RobiNN\UiKit\UiKit {
    $config = new RobiNN\UiKit\Config([
        'cache'     => __DIR__.'/../cache',
        'debug'     => true,
        'framework' => isset($_GET['sm']) ? 'fomanticui2' : 'bootstrap5', // for development purposes
    ]);

    return RobiNN\UiKit\UiKit::getInstance()->init($config);
}

get_ui()->setPath(__DIR__.'/templates');

echo get_ui()->renderTpl('page', [
    'framework' => get_ui()->config->getFramework(),
]);
